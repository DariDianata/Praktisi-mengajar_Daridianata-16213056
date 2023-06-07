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
    
            return "Berhasil menyimpan";
        }
    
}
