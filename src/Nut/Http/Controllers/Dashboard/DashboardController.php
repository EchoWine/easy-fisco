<?php

namespace Nut\Http\Controllers\Dashboard;

use Nut\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
		return view('Nut::dashboard');
	}

}
