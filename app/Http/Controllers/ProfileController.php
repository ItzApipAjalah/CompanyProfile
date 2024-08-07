<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(Profile $profile) {
        $admin = auth()->user();
        return view('profile.edit', compact('profile' , 'admin'));
    }

    public function index()
    {
        $admin = auth()->user();
        $profiles = Profile::all();
        return view('profile.index', compact('profiles' , 'admin'));
    }
    public function update(Profile $profile) {
        $data = request()->validate([
            'tentang' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $profile->update($data);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }
}
