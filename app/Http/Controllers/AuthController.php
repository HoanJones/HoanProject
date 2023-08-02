<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
	public function index() {
		return view( 'auth.login' );
	}

	public function processLogin( Request $request ) {
		$credentials = $request->only( 'id', 'password' );
		if ( Auth::attempt($credentials, FALSE) ) {
			return redirect()->route( 'home' )->with( 'success', 'Signed in' );

			// Phân quyền truy cập người dùng
			/*
			$user = Auth::user();
				if ($user->role === 'admin') {
					return redirect()->route('admin.dashboard')->with('success', 'Signed in');
				} elseif ($user->role === 'member') {
					return redirect()->route('member.dashboard')->with('success', 'Signed in');
				} elseif ($user->role === 'ex_member') {
					return redirect()->route('ex_member.dashboard')->with('success', 'Signed in');
				}
			*/
		}

		return redirect()->route( 'login' )
		                 ->with( 'error', 'Tài khoản hoặc mật khẩu không chính xác' );
	}

	public function recoverpw() {
		return view( 'auth.recoverpw' );
	}

	public function logout( Request $request ) {
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route( 'login' );
	}
}
