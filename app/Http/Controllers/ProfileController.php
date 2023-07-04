<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function uploadView()
    {
        return view('profile.upload');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|file|max:2048',
        ]);

        // simpan gambar pada user yang sedang login
        $user = $request->user();
        $user->avatar = $request->file('image')->store('avatar');
        $user->save();

        return redirect('/profile/upload')->with('success', 'Berhasil mengupload avatar');
    }
}
