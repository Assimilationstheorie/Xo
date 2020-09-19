<?php
namespace App\Http\Controller\Api\User;

use Exception;
use Xo\User\Auth;
use Xo\User\Token;
use Xo\User\Valid;
use App\Http\Model\User\UserInfo;

/**
 * Get user public info
 */
class ApiUserInfo
{
	/**
	 * Logged user info
	 *
	 * Route: /api/user/info
	 * GET, POST
	 *
	 * @return void
	 */
	function Index()
	{
		// Validate token
		$user = Auth::IsAuthorized();

		// Get logged user data
		unset($user->pass);
		return json_encode($user);
	}

	function Id()
	{
		$id = (int) $_POST['id'];
		if($id <= 0)
		{
			throw new Exception("ERR_ID", 1);
		}

		$user = UserInfo::GetWithId($id);
		return json_encode($user);
	}

	function Alias()
	{
		$str = $_POST['alias'];
		if(empty($str))
		{
			throw new Exception("ERR_ALIAS", 1);
		}

		$user = UserInfo::GetWithAlias($str);
		return json_encode($user);
	}

	function Email()
	{
		$str = $_POST['email'];
		if(empty($str))
		{
			throw new Exception("ERR_EMAIL", 1);
		}

		$user = UserInfo::GetWithEmail($str);
		return json_encode($user);
	}
}