<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;
use App\Models\Company;

class TeamController extends Controller
{
    public function index()
    {
    
        $teamGroups =  Administration::where('status', 1)->get(); 
        return view('equipe.index', compact('teamGroups'));
    }

   
}
