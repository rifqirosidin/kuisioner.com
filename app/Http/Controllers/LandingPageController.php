<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Slider;
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
