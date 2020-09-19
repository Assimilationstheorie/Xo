<?php
namespace App\Http\Controller\Api;

use Exception;
use Xo\User\Auth;
use Xo\User\Token;
use Xo\User\Valid;

/**
 * Get user credentials
 */
class ApiAuth
{
	/**
	 * Authenticate user
	 *
	 * Route: /api/auth
	 * POST: {email}, {pass}
	 *
	 * @return void
	 */
	function Index()
	{
		if(empty($_POST['email']) || empty($_POST['pass']))
		{
			throw new Exception("ERR_EMPTY_EMAIL_PASS", 1);
		}
		Valid::Email($_POST['email']);

		$user = Auth::Get($_POST['email']);
		if(empty($user))
		{
			throw new Exception("ERR_USER_CREDENTIALS", 1);
		}
		if($user->active == 0)
		{
			throw new Exception("ERR_USER_ACTIVATION", 1);
		}
		if($user->baned == 1)
		{
			throw new Exception("ERR_USER_BANNED", 1);
		}
		if($user->closed == 1)
		{
			throw new Exception("ERR_USER_ACCOUNT_CLOSED", 1);
		}

		$pass = Auth::PassHash($_POST['pass'],'md5');
		if($pass != $user->pass)
		{
			throw new Exception("ERR_USER_CREDENTIALS", 1);
		}

		$token = Token::Update($user->id);
		if(empty($token))
		{
			throw new Exception("ERR_TOKEN", 1);
		}

		unset($token->id);
		return json_encode($token);
	}
}