<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    public function index(){

        
        return view('formations.index');
    }

    public function formations($slug){
      
      
       
        return view('formations.'.$slug, compact('slug'));
    }

    public function inscription($id){

       
        return view('formations.inscription.tableconversation', compact('id'));
    }

    public function calendrier($slug){      

       
        return view('formations.calendrier', compact('slug'));
    }

    public function formation($slug, $formation){      

       
        return view('formations.inscription.formation', compact('slug', 'formation'));
    }

    public function courses($slug){      

      
        return view('formations.courses', compact('slug'));
    }

    public function niveau($slug, $niveau){      

       
        return view('formations.inscription.niveau', compact('slug', 'niveau'));
    }

     
    
}
