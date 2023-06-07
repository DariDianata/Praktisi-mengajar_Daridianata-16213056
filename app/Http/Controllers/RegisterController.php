<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
        //  untuk show halaman register
        public function show()
        {
            return view('register');
        }
    
    
        // untuk menyimpan data ke database
        public function register(Request $request)
        {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
            return "Berhasil menyimpan";
        }
    
}
