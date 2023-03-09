<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
	public function show() {
		return view('register');
	}
    public function submit(RegisterRequest $request) {
        User::create($request->validated());
        return response('{"success":true}', 200)->header('Content-Type', 'application/json');
    }
}