<?php
	

	namespace App\Http\Controllers;
	

	use Illuminate\Http\Request;
	use App\Models\User;
	use Illuminate\Support\Facades\Hash;
	

	class LoginController extends Controller
	{
	    public function show(Request $request)
	    {
	        return view('login');
	    }
	

	    public function login(Request $request)
	    {
	        // dd($request);
	        // login
	        $email = $request->email;
	        $password = $request->password;
	

	    
	        $user = User::where('email', $email)->first();
	        $hashedPassword = $user->password;
	

	        if (Hash::check($password, $hashedPassword)) {
	            return "Berhasil Login";
	        } else {
	            return "Gagal Login";
	        }
	

	

	

	        return $user;
	    }
	}

