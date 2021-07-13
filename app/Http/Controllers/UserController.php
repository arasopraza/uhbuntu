<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function resetPassword(Request $request){
        $user = User::where('email', $request->email);
        if($user->first() != null){
            if($request->password == $request->confirmPassword){
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                return redirect()->route('login');
            }else{
                return redirect()->back()->with('errorPassword', 'konfirmasi password tidak sesuai');
            }
        }else{
            return redirect()->back()->with('errorEmail', 'Email Tidak Ditemukan');
        }
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if($request->photo){
            if($user->photo != null){
                    Storage::delete(storage_path('app/public/profile') . '/' . $user->photo);
            }
            $request->photo->store('public/profile');
            $user->photo = $request->photo->hashName();
        }
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();
        return redirect()->back();
    }

    public function store(Request $request){
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }
}
