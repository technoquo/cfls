<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Company;
use App\Models\CoursPrive;
use App\Models\FormationAccelere;
use App\Models\FormationAnne;
use App\Models\Formations;
use Illuminate\Http\Request;
use App\Models\Sensibilisation;
use App\Models\TableConversation;

class FormationsController extends Controller
{
    public function index(){

        $formations = Formations::all();
        return view('formations.index', compact('formations'));
    }

    public function formations($slug){

            $formation = Formations::where('slug', $slug)->first();

            return view('formations.formation', compact('slug','formation'));
    }

    public function inscription($slug, $id){


        $inscription = TableConversation::FindOrFail($id);
        $availables =  TableConversation::where('status',1)->get();
        $company = Company::first();
        return view('formations.inscription.tableconversation', compact('slug','inscription','company','availables'));
    }

    public function calendrier($slug){

        $formation = Formations::where('slug', $slug)->first();
        $calendars = Calendar::whereStatus(1)->where('formations_id',$formation->id)->get();
        return view('formations.calendrier', compact('calendars', 'slug', 'formation'));
    }



    public function formation($slug, $formation){


        $inscription = Calendar::where('slug', $formation)->first();
        $formation = Formations::where('slug', $slug)->first();


        return view('formations.inscription.formation', compact('slug', 'inscription', 'formation'));
    }

    public function courses($slug){


        return view('formations.courses', compact('slug'));
    }

    public function niveau($slug, $niveau){


        return view('formations.inscription.niveau', compact('slug', 'niveau'));
    }



}
