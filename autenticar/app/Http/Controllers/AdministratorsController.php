<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdministratorsController extends Controller
{
    use AuthenticatesUsers;
	//public function showLoginForm()
	//{
		//return view('administrators.login');
	//}
    protected $loginView = 'administrators.login';
    protected $guard = 'admins';

    function __construct()
    {
    	$this->middleware('auth:admins',['only' => ['secret']]);
    }

    public function authenticated()
    {
    	return redirect('admins/area');
    }

    public function secret()
    {
    	return 'Hola'.auth('admins')->user()->name . 'mi numero es  ' . auth('admins')->user()->phone;
    }
}
