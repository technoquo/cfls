<?php

namespace App\Http\Controllers;

use App\Models\Don;
use App\Models\Feature;
use App\Models\Member;
use App\Models\Company;
use App\Models\History;
use App\Models\Mission;
use App\Models\Soutien;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Company::first();
        $features = Feature::where('status', 1)->get();
        $history = History::first();
        $mission = Mission::first();
        $don = Don::first();
        $members = Member::first();
        $soutens = Soutien::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();

        return view('home.index', compact('data','features','history','mission','don','members','soutens','testimonials'));
    }

    public function contacto()
    {


        $data = Company::first();
        return view('home.contact', compact('data'));

    }


}
