<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{



    public function store(Request $request)
    {
        //
    }



    public function edit(User $user)
    {
        return view('dashboard.profile.edit', compact('user'));
    }


    public function update(User $user)
    {
        $password = request('password');
        if (isset($password)){
            $user->update([
                'name' => \request('name'),
                'email' => \request('email'),
                'password' => bcrypt(\request('password'))
            ]);
        } else {
            $user->update([
                'name' => \request('name'),
                'email' => \request('email'),
            ]);
        }


        Session::flash('success', 'Profi Berhasil diperbarui');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
