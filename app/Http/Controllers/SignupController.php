<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SignupRequest;
use App\Models\User;

class SignupController extends Controller
{
    public function index(){
        return view('contents.auth.sign-up');
    }

    public function signUp(SignupRequest $request){
        try {
            User::create([
                'type' => $request->type,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return back()->with('success', 'Registered!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
