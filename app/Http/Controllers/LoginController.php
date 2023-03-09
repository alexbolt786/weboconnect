<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function show() {
		return view('login');
	}
	public function submit(LoginRequest $request) {
		$credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
			return response('{"success":true}', 200)->header('Content-Type', 'application/json');
        }
		return response('{"success":false}', 200)->header('Content-Type', 'application/json');
	}
}