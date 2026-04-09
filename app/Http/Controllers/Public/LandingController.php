<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\LandingHero;
use App\Models\DietProgram;
use App\Models\DietBenefit;
use App\Models\DietMenu;
use App\Models\CustomerTestimonial;
use App\Models\Faq;

class LandingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $hero = LandingHero::first();
        $programs = DietProgram::orderBy('display_order')->get();
        $benefits = DietBenefit::orderBy('display_order')->get();
        $menus = DietMenu::all()->groupBy('day');
        $testimonials = CustomerTestimonial::orderByDesc('rating')->get();
        $faqs = Faq::orderBy('display_order')->get();

        return view('public.landingpage', compact(
            'settings', 'hero', 'programs', 'benefits', 'menus', 'testimonials', 'faqs'
        ));
    }
}
