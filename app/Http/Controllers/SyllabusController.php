<?php

namespace App\Http\Controllers;

use App\Models\Syllabu;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    public function index()
    {
       $syllabus = Syllabu::where('status', 1)->get();
        return view('syllabus.index',[
            'syllabus' => $syllabus,
        ]);
    }

    public function syllabus($slug)
    {
        $syllabus = Syllabu::where('slug', $slug)
                             ->where('status', 1)
                             ->first();

        $syllabu = $syllabus->themes()->where('status', 1)->with('videos')->first();

        $videofirst = $syllabus->themes()->where('status', 1)->with('videos')->first();

         $themes = $syllabus->themes()->where('status', 1)->with('videos')->get();




        return view('syllabus.show', [
            'syllabus' => $syllabus,
            'syllabu' => $syllabu,
            'videofirst' => $videofirst->videos->first(),
            'themes' => $themes,
        ]);
    }
}
