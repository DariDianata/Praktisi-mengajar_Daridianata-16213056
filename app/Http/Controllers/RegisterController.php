<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller {
    // fungsi pertama untuk menampilkan halaman register
    public function show()
    {
        return view('register');
    }

    // fungsi kedua untuk menyimpan data ke database
    public function register(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'member';
        $user->save();

        return redirect('/login')->with('success', 'Berhasil mendaftar, silahkan login');
 }
}
