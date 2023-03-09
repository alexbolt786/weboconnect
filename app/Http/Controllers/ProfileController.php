<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MultiPartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ProfileController extends Controller
{
	public function show() {
		$user = Auth::user();
		$email = $user->email;
		$act = Crypt::encryptString($email);
		return view('profile.home')->with('act', $act);
	}
	public function edit(Request $request) {
		$act = $request->get('act');
		if (empty($act)) return redirect()->route('login');
		$email = '';
		try {
			$email = Crypt::decryptString($act);
		} catch (DecryptException $e) {
			if (empty($act)) return redirect()->route('login');
		}
		$user = User::where('email', $email)->first();
		if (empty($user)) return redirect()->route('login');
		Auth::login($user);
		return view('profile.edit', [ 'user' => $user ]);
	}
	public function people() {
		return view('people', [ 'users' => User::all() ]);
	}
	public function submit(MultiPartRequest $request) {
		$validated = $request->validated();
		$user = Auth::user();
		$updated = false;
		if ($user->firstName != $request->get('firstName')) {
			$user->firstName = $request->get('firstName');
			$updated = true;
		}
		if ($user->lastName != $request->get('lastName')) {
			$user->lastName = $request->get('lastName');
			$updated = true;
		}
		if ($request->hasFile('image')) $request->file('image')->move(public_path().'/images/', hash('sha256', $user->email));
		if ($updated) $user->save();
		return redirect()->route('userProfileHome');
	}
}