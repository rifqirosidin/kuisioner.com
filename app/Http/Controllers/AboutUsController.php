<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutUsController extends Controller
{

    public function index()
    {
        $aboutUs = AboutUs::all();
        return view('admin.setting.about_us.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin.setting.about_us.create');
    }

    public function store(Request $request)
    {
        AboutUs::create([
           'content' => $request->get('content')
        ]);
        Session::flash('success', 'Data berhasil disimpan');
        return redirect()->route('about-us.index');
    }

    public function show(AboutUs $aboutUs)
    {
        //
    }

    public function edit(AboutUs $aboutUs)
    {
        return view('admin.setting.about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        $aboutUs->update([
           'content' => $request->get('content')
        ]);
        Session::flash('success', 'Update data berhasil');
        return redirect()->route('about-us.index');
    }

    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        Session::flash('success', 'hapus data berhasil');
        return route('about-us.index');
    }
}
