<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;


class ProfileController extends Controller
{
    public function edit(Profile $profile) {
        return view('profile.edit', compact('profile'));
    }

    public function update(Profile $profile) {
        $data = request()->validate([
            'tentang' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $profile->update($data);

        return redirect()->route('teams.index')->with('success', 'Profile updated successfully.');
    }
}
