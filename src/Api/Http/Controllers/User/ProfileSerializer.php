<?php

namespace Api\Http\Controllers\User;

use Core\User\User;

class ProfileSerializer
{

	public function serialize(User $user)
	{	
		return [
			'id' => $user->id,
			'username' => $user->username,
			'name' => $user->name,
			'email' => $user->email
		];
	}
}