<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.setting.banner.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'slider' => 'required|image|mimes:png,jpg,jpeg,svg'
        ]);

        if ($request->hasFile('slider')){
            Slider::create([
                'image' => $request->file('slider')->store('slider'),
                'status' => \request('status')
            ]);
            Session::flash('Created Slider Successfully');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.setting.banner.edit_slider', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        if ($request->hasFile('slider')){
            Storage::delete($slider->image);
            $slider->update([
                'image' => $request->file('slider')->store('slider'),
                'status' => \request('status')
            ]);

        } else {
            $slider->update([
                'status' => \request('status')
            ]);
        }
        Session::flash('Updated Slider Successfully');
        return redirect()->route('banners.index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        Storage::delete($slider->image);
        Session::flash('Deleted Slider Successfully');
        return route('banners.index');
    }
}
