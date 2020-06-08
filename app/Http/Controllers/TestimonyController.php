<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestimonyController extends Controller
{

    public function index()
    {
        $testimonies = Testimony::all();
        return view('admin.setting.testimony.index', compact('testimonies'));
    }

    public function create()
    {
        return view('admin.setting.testimony.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required|string',
           'content' => 'required|string'
        ]);

        Testimony::create($validated);
        Session::flash('success', 'Created Testimony Successfully');
        return redirect()->route('testimonies.index');
    }

    public function show(Testimony $testimony)
    {
        //
    }

    public function edit(Testimony $testimony)
    {
        return view('admin.setting.testimony.edit', compact('testimony'));
    }


    public function update(Request $request, Testimony $testimony)
    {
        $validated = $request->validate([
           'title' => 'required}string',
           'content' => 'required|string'
        ]);

        $testimony->update($validated);
        Session::flash('success', 'Updated Testimony Successfully');
        return redirect()->route('testimonies.index');
    }

    public function destroy(Testimony $testimony)
    {
        $testimony->delete();
        Session::flash('success', 'Deleted Testimony Successfully');
        return route('testimonies.index');
    }
}
