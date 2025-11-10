<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\WordCross;
use Illuminate\Http\Request;
use Crossword\Crossword;
use Crossword\Generate\Generate;

class CrosswordController extends Controller
{
    public function index(Request $request)
    {
        $limit  = 9;
        $size_x = $request->query('size_x', 15);
        $size_y = $request->query('size_y', 15);

        // 1️⃣ Seleccionar palabras aleatorias
        $dbWords = WordCross::inRandomOrder()
            ->limit((int)$limit)
            ->orderBy('length', 'desc')
            ->get();

        if ($dbWords->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No hay palabras disponibles en la base de datos.'
            ], 404);
        }

        // 2️⃣ Preparar palabras y pistas
        $wordsForGenerator = $dbWords->pluck('text')->toArray();
        $clues = $dbWords->pluck('clue', 'text')->toArray();

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

        // 5️⃣ Convertir datos de cada palabra colocada
        $wordsPlaced = $crossword->getWords();
        $enrichedWords = [];

        foreach ($wordsPlaced as $index => $wordObject) {
            $text = $wordObject->getWord();
            if (!$text) continue;

            $baseCol = $wordObject->getBaseColumn();
            $baseRow = $wordObject->getBaseRow();

            $x = (!is_null($baseCol) && method_exists($baseCol, 'getIndex')) ? $baseCol->getIndex() : (is_numeric($baseCol) ? $baseCol : 0);
            $y = (!is_null($baseRow) && method_exists($baseRow, 'getIndex')) ? $baseRow->getIndex() : (is_numeric($baseRow) ? $baseRow : 0);

            // 💡 Mezcla automática según índice
            $orientation = $index % 2 === 0 ? 'across' : 'down';

            $enrichedWords[] = [
                'text' => $text,
                'clue' => asset('img/'. $clues[$text]) ?? '',
                'x' => $x,
                'y' => $y,
                'orientation' => $orientation,
            ];
        }


        // 6️⃣ Respuesta final
        return response()->json([
            'success' => true,
            'board' => $board,
            'words' => $enrichedWords,
            'total_words' => count($enrichedWords)
        ]);
    }
}
