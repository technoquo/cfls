<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CategoryMotCross;
use App\Models\WordCross;
use Illuminate\Http\Request;
use Crossword\Crossword;
use Crossword\Generate\Generate;

class CrosswordController extends Controller
{
    public function index(Request $request)
    {
        $limit  = $request->query('limit', 6);
        $size_x = $request->query('size_x', 9);
        $size_y = $request->query('size_y', 9);


        $totalCategorias = WordCross::distinct('category_mot_crosses_id')
            ->count('category_mot_crosses_id');
        $num_aleatorio = rand(1, $totalCategorias);
        $categoria = CategoryMotCross::find($num_aleatorio);
        $nombreCategoria = $categoria ? $categoria->name : null;
        // 1️⃣ Seleccionar palabras aleatorias
        $dbWords = WordCross::inRandomOrder()
            ->where('category_mot_crosses_id', $num_aleatorio) // palabras comunes
            ->limit((int)$limit)
            ->orderBy('length', 'desc')
            ->get(['text', 'clue']); // usamos clue como imagen

        if ($dbWords->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No hay palabras disponibles en la base de datos.'
            ], 404);
        }

        // 2️⃣ Preparar palabras
        $wordsForGenerator = $dbWords->pluck('text')->toArray();

        // 3️⃣ Generar crucigrama
        $crossword = new Crossword($size_x, $size_y, $wordsForGenerator);
        $isGenerated = $crossword->generate(Generate::TYPE_RANDOM);

        if (!$isGenerated) {
            return response()->json([
                'success' => false,
                'message' => 'No se pudo generar un crucigrama. Intente cambiando el tamaño o número de palabras.'
            ], 500);
        }

        // 4️⃣ Matriz visual
        $board = $crossword->toArray();

        // 5️⃣ Obtener palabras colocadas
        $wordsPlaced = $crossword->getWords();
        $enrichedWords = [];

        foreach ($wordsPlaced as $index => $wordObject) {
            $text = $wordObject->getWord();
            if (!$text) continue;

            $baseCol = $wordObject->getBaseColumn();
            $baseRow = $wordObject->getBaseRow();

            $x = (!is_null($baseCol) && method_exists($baseCol, 'getIndex'))
                ? $baseCol->getIndex()
                : (is_numeric($baseCol) ? $baseCol : 0);

            $y = (!is_null($baseRow) && method_exists($baseRow, 'getIndex'))
                ? $baseRow->getIndex()
                : (is_numeric($baseRow) ? $baseRow : 0);

            // Alternar orientación
            $orientation = $index % 2 === 0 ? 'across' : 'down';

            // Obtener la pista (que en este caso es la URL o nombre del archivo)
            $wordData = $dbWords->firstWhere('text', $text);
            $clueValue = $wordData ? $wordData->clue : null;

            // Si el valor no empieza con "http", asumimos que es nombre de archivo local
            if ($clueValue && !str_starts_with($clueValue, 'http')) {
                $clueValue = asset('img/' . $clueValue);
            }

            $enrichedWords[] = [
                'word' => $text,
                'clue' => $clueValue ?? asset('img/default.png'),
                'x' => $x,
                'y' => $y,
                'orientation' => $orientation,
            ];
        }

        // 6️⃣ Solo mostrar 5 clues
        $limitedWords = array_slice($enrichedWords, 0, 5);

        // 7️⃣ Respuesta final
        return response()->json([
            'success' => true,
            'message' => 'Crucigrama generado correctamente.',
            'board' => $board,
            'clues' => $limitedWords,
            'category_name' => $nombreCategoria,
            'total_words' => count($limitedWords)
        ]);
    }
}
