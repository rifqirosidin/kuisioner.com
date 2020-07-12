<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    public function edit(User $user)
    {
        return view('dashboard.profile.edit', compact('user'));
    }


    public function update(User $user)
    {
        $password = request('password');
        if (isset($password)){
            \request()->validate([
                'password' => 'required|string|confirmed'
            ]);
            $user->update([
                'password' => bcrypt(\request('password'))
            ]);
            Session::flash('success', 'Updated password successfully');
        } else {
          request()->validate([
                'name' => 'required|string',
                'email' => 'required|unique:users,email,'.$user->id,
            ]);
            $user->update([
                'name' => \request('name'),
                'email' => \request('email'),
                'phone' => \request('phone'),
                'address' => \request('address'),
                'birthday' => \request('birthday'),
                'gender' => \request('gender'),
            ]);

            Session::flash('success', 'Updated profil successfully');
        }

        return redirect()->back();
    }

    public function updatePhotoProfile()
    {

        $id = Auth::id();
        $user = User::find($id);
        try {
            if (\request()->hasFile('avatar')){
                $avatar = \request()->file('avatar')->store('avatar');
                Storage::delete($user->avatar);
                $user->update([
                    'avatar' => $avatar
                ]);
            }
            Session::flash('success', 'Ubah foto profil sukses');
            return redirect()->route('users.edit', $id);

        }catch (\Exception $exception){
            Session::flash('error', 'Ubah foto profil gagal');
            return redirect()->back();
        }
    }


}
