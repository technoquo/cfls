<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    public function index()
    {
        return view('syllabus.index');
    }
}
