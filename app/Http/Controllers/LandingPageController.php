<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Task;
use App\Models\Testimony;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{

    public function index()
    {
        $sliders = Slider::active()->get();
        $banner = Banner::latest()->first();
        $testimonies = Testimony::all();
        return view('landing_page.index', compact('sliders', 'testimonies' ,'banner'));
    }

    public function listSurvey()
    {
        $tasks = Task::with(['user', 'form.formElements.listOptions'])->latest()->get();

        return view('list_survey.index', compact('tasks'));
    }

    public function aboutUs()
    {
        $aboutUs = AboutUs::first();
        return view('landing_page.about_us', compact('aboutUs'));
    }
    public function contact()
    {
        $aboutUS = AboutUs::latest()->first();

        return view('landing_page.contact',compact('aboutUS'));
    }
}
