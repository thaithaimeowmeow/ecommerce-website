<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('profile.index');
    }


    public function saveDetails()
    {
        $data = request()->validate([
            'name' => ['max:25', 'required', 'string'],
            'address' => ['max:25', 'required', 'string'],
            'phone' => ['max:10', 'required', 'string'],
            'avatar' => ['image'],
        ]);

        $profile = auth()->user()->profile;
        if (request('avatar') != NULL) {
            $imagePath = request('avatar')->store('avatar', 'public');
            $img = Image::make(public_path("storage/{$imagePath}"));
            $img->fit(1200, 1200);
            $img->save();
        } else
            $imagePath = $profile->avatar;

        $profile->name = $data['name'];
        $profile->address = $data['address'];
        $profile->phone = $data['phone'];
        $profile->avatar = $imagePath;


        $profile->save();




        return redirect('profile/edit');
    }
    public function passwordIndex()
    {
        return view('profile.chgPw');
    }


    public function savePassword()
    {
        $data = request()->validate([
            'current_password' => ['required', 'string', 'min:8', 'current_password'],
            'new_password' => ['required', 'string', 'min:8'],
            're_new_password' => ['required', 'string', 'min:8'],
        ]);


        if (!strcmp($data['new_password'], $data['re_new_password'])) //0 mean true
        {
            $user = auth()->user();
            $user = User::find($user->id);
            $newPassword = Hash::make($data['new_password']);
            $user->password = $newPassword;
            $user->save();
            Alert::success('Thành Công');
            return view('profile.chgPw');
        } else
        {
            Alert::warning('Thật bại');
            return view('profile.chgPw');
        }


    }
}
