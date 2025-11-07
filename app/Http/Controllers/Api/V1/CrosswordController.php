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
        // Parámetros opcionales
        $limit  = $request->query('limit', 6);
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

        // 4️⃣ Convertir la matriz visual
        $board = $crossword->toArray();

        // 5️⃣ Convertir datos de cada palabra colocada
        $wordsPlaced = $crossword->getWords();
        $enrichedWords = [];

        foreach ($wordsPlaced as $wordObject) {
            $wordsArray = json_decode(json_encode($wordObject), true);
            $text = $wordsArray['text'] ?? null;

            if (!$text) {
                continue;
            }

            $wordsArray['clue'] = $clues[$text] ?? 'Pista no disponible.';
            $enrichedWords[] = $wordsArray;
        }

        return response()->json([
            'success' => true,
            'board' => $board,
            'words' => $enrichedWords,
            'total_words' => count($enrichedWords)
        ]);
    }
}
