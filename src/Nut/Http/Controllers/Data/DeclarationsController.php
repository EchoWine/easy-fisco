<?php

namespace Nut\Http\Controllers\Data;

use Nut\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeclarationsController extends Controller
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
		return view('Nut::declarations');
	}

}
