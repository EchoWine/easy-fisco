<?php

namespace Api\Http\Controllers\User;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\User\UserManager;

class ProfileController extends Controller
{

	/**
	 * Display current user
	 *
	 * @param Request $request
	 *
	 * @return response
	 */
	public function index(Request $request)
	{

		$serializer = new ProfileSerializer();
		$data = $serializer->serialize(\Auth::user());
		
		return $this->success(['data' => $data]);
	}

}
