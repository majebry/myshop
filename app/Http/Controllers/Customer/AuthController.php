<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login()
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $creds = request()->only('email', 'password');

        if (auth('web_customer')->attempt($creds)) {
            return redirect()->intended();
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        auth('web_customer')->logout();

        return redirect('customer/login');
    }
}
