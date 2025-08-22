<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\CompanyAbout;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function index()
    {
        $hero_sections = HeroSection::orderByDesc('id')->take(1)->get();
        $testimonials = Testimonial::take(4)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();

        return view('front.index', compact('statistics', 'principles', 'products', 'teams', 'testimonials', 'hero_sections'));
    }

    public function team()
    {
                $statistics = CompanyStatistic::take(4)->get();

        $teams = OurTeam::take(7)->get();
        return view('front.team', compact('teams', 'statistics'));
    }
    public function about()
    {
        $statistics = CompanyStatistic::take(4)->get();
        $abouts = CompanyAbout::take(2)->get();
        return view('front.about', compact('statistics', 'abouts'));
    }   
    public function appointment()
    {        $testimonials = Testimonial::take(4)->get();
        $products = Product::take(3)->get();

       return view('front.appointment', compact('testimonials', 'products'));
    }

    public function appointment_store(StoreAppointmentRequest $request)
    {
        
        DB::transaction(function() use($request){
            $validated = $request->validated();
            $newAppointment = Appointment::create($validated);
        });

        return redirect()->route('front.index')->with('success', 'Your appointment has been booked successfully!');

    }
}
