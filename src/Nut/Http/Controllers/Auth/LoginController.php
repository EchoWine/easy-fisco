<?php

namespace Nut\Http\Controllers\Auth;

use Nut\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

	/**
	 * Return login form
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('Nut::login');
	}

}
