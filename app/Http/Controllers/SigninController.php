<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SigninRequest;
use App\Models\User;

class SigninController extends Controller
{
    public function index(){
        return view('contents.auth.sign-in');
    }

    public function signIn(SigninRequest $request){
        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                return redirect()->route('books.index');
            }

            return back()->with('error', 'Invalid credentials');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
