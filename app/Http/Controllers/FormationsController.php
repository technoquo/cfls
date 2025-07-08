<?php

namespace App\Http\Controllers;

use App\Mail\InscriptionConfirmationMail;
use App\Models\Calendar;
use App\Models\Company;
use App\Models\CoursPrive;
use App\Models\FormationAccelere;
use App\Models\FormationAnne;
use App\Models\Formations;
use App\Models\InscriptionFormation;
use Illuminate\Http\Request;
use App\Models\Sensibilisation;
use App\Models\TableConversation;
use Illuminate\Support\Facades\Mail;

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

    public function inscrits(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',

        ]);

        $calendar = Calendar::where('id', $id)->first();

        $formation = Formations::where('id', $calendar->formations_id)->first();
        if (!$calendar) {
            return redirect()->back()->with('error', 'Calendrier non trouvé.');
        }




        $inscription = InscriptionFormation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'formations_id' => $calendar->formations_id,
            'levels_id' => $calendar->levels_id
        ]);

        Mail::to($request->email)->send(new InscriptionConfirmationMail($inscription,$formation,$calendar));

        return redirect()->back()->with('success', 'Inscription réussie !');
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
