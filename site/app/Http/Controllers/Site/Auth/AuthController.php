<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Corcel\User;
use Validator;
use Session;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/';
    protected $redirectPath = '/';
    protected $redirectAfterLogout = '/';
    protected $username = 'username';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_login' => 'required|max:255|unique:users',
            'user_email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:5',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	$user = new User;
    	$user->user_login = $user->user_nicename = $user->display_name = $data['user_login'];
    	$user->user_email = $data['user_email'];
    	$user->resetPassword($data['password']);
    	$user->save();

    	return $user;
    }
}
