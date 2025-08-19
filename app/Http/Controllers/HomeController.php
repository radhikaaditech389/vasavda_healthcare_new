<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Footer;
use App\Models\Menu;
use App\Models\Services;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sequence')->get();

        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();

        $aboutSection = AboutSection::first();
        $services = Services::all();
        return view('home', compact('footer', 'menus', 'sliders', 'aboutSection', 'services'));
    }

    public function book_appointment()
    {
        return view('patient.book_appointment');
    }

    public function contact()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.contact', compact('footer', 'menus'));
    }

    public function home_care()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.homecareservice', compact('footer', 'menus'));
    }

    public function about_us()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.about_us', compact('footer', 'menus'));
    }

    public function doctors()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.doctors', compact('footer', 'menus'));
    }

    public function why_vasavada()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.why_vasavada', compact('footer', 'menus'));
    }

    public function testimonials()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.testimonials', compact('footer', 'menus'));
    }

    public function service()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.service', compact('footer', 'menus'));
    }


    public function sonography()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.3d_4d_sonography', compact('footer', 'menus'));
    }

    public function cancer_care()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.cancer_care', compact('footer', 'menus'));
    }

    public function clinic()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.clinic', compact('footer', 'menus'));
    }

    public function cosmetic_gynecology()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.cosmetic_gynecology', compact('footer', 'menus'));
    }

    public function dietitian()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.dietitian', compact('footer', 'menus'));
    }

    public function service_home_care()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.home_care', compact('footer', 'menus'));
    }

    public function interfertility()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.interfertility', compact('footer', 'menus'));
    }

    public function laproscopy()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.laproscopy', compact('footer', 'menus'));
    }

    public function mental_health()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.mental_health', compact('footer', 'menus'));
    }

    public function pediatric()
    {
        return view('patient.service.pediatric');
    }

    public function physiotherpy()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.physiotherpy', compact('footer', 'menus'));
    }

    public function pragnancy_care()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.pragnancy_care', compact('footer', 'menus'));
    }

    public function preventive_oncocgynocology()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.preventive_oncogynocology', compact('footer', 'menus'));
    }

    public function sexual_health()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.sexual_health', compact('footer', 'menus'));
    }

    public function urogynocology()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.service.urogynocology', compact('footer', 'menus'));
    }

    public function vacination()
    {
        return view('patient.service.vacination');
    }

    public function dr_mitali()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.dr_mitali', compact('footer', 'menus'));
    }

    public function clinic_inner_page()
    {
        return view('patient.service.clinic_innerpage');
    }
    public function setu_newborn()
    {
        return view('patient.setu_newborn');
    }

    public function faq()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.faq', compact('footer', 'menus'));
    }

    public function explore_our_space()
    {
        $menus = Menu::where('is_displayed', 1)
            ->orderBy('sequence')
            ->with('submenus')
            ->get();

        $footer = Footer::first();
        return view('patient.360_view', compact('footer', 'menus'));
    }
}
