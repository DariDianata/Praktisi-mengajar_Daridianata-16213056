<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
<<<<<<< HEAD
    // fungsi pertama untuk show halaman register
    public function show()
    {
        return view('register');
    }

    // fungsi kedua untuk menyimpan data ke database
    public function register(Request $request)
    {
=======
        //  untuk show halaman register
        public function show()
        {
            return view('register');
        }
    
    
        // untuk menyimpan data ke database
        public function register(Request $request)
        {
>>>>>>> d2361a6c4b7a6b534254c3469e885b93e91ce0d2
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
<<<<<<< HEAD
        $user->role = 'member';
        $user->save();

        return redirect('/login')->with('success', 'Berhasil mendaftar, silahkan login');
    }
=======
        $user->save();
            return "Berhasil menyimpan";
        }
    
>>>>>>> d2361a6c4b7a6b534254c3469e885b93e91ce0d2
}
