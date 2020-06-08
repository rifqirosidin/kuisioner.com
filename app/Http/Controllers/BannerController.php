<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class BannerController extends Controller
{

    public function index()
    {
      $banners =  Banner::latest()->get();
      $sliders =  Slider::latest()->get();
//        return $banners;
      return view('admin.setting.banner.index', compact('banners', 'sliders'));
    }

    public function create()
    {
        return view('admin.setting.banner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'title' => 'required|string',
           'description' => 'required|string',
        ]);

        try {
          Banner::create($validated);

            Session::flash('success', 'Created Caption Successfully');
        } catch (\Exception $exception) {
            return $exception;
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.setting.banner.edit_caption', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $banner->update([
           'title' => \request('title'),
           'description' => \request('description')
        ]);
        Session::flash('success', 'Updated Caption Successfully');
        return redirect()->route('banners.index');
    }

    public function destroy($id)
    {
        Banner::destroy($id);
        Session::flash('success', 'Deleted Caption Successfully');

        return route('banners.index');
    }
}
