<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function register(Request $request)
    {
        //validasi dan pembuatan user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //menambahkan role=member ke user yang baru dibuat
        $user->assignRole('member');

        //redirect/response lainnya
    }

}
