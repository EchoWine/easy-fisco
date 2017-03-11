<?php

namespace Api\Http\Controllers\Auth;

use Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\User\UserManager;

class RegistrationController extends Controller
{

	/**
	 * Register a user
	 *
	 * @param Request $request
	 *
	 * @return response
	 */
	public function index(Request $request)
	{

		$um = new UserManager();
			
		try{

			$um->create($request->only(['username','password','password_repeat','email']));

		} catch (Exception $e){

			return $this->error(['message' => $e->getMessage()]);

		}

		return $this->success(['message' => 'ok']);

	}

}
