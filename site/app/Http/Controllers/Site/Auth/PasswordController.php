<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Corcel\Auth\ResetsPasswords as CorcelResetsPasswords;

class PasswordController extends Controller
{
    use ResetsPasswords, CorcelResetsPasswords {
        CorcelResetsPasswords::resetPassword insteadof ResetsPasswords;
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function getResetValidationRules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ];
    }
}