<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoggingInRequest;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\Login\RememberMeExpiration;

class AuthController extends Controller
{
    use RememberMeExpiration;

    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param  LoggingInRequest  $request
     *
     * @return RedirectResponse
     * @throws BindingResolutionException
     */
    public function loggingIn(LoggingInRequest $request)
    {

        $credentials = $request->getCredentials();

        if ( ! Auth::validate($credentials)):
            return redirect()->route('login')
                             ->withErrors('Invalid credentials');
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if ($request->get('remember')):
            $this->setRememberMeExpiration($user);
        endif;

        return $this->authenticated($request, $user);

    }

    /**
     * Handle response after user authenticated
     *
     * @param  Request  $request
     * @param  Auth  $user
     *
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return redirect()->intended()->with('success', 'You have Successfully Logged In');
    }

    public function recoverpw()
    {
        return view('auth.recoverpw');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login');
    }
}
