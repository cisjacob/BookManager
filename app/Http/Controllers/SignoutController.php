<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignoutController extends Controller
{
    public function signOut(Request $request) {
        Auth::logout();
        
    }
}
