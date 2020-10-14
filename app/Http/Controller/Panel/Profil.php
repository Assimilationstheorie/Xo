<?php
namespace App\Http\Controller\Panel;

use Exception;
use Xo\Db\Mysql\Db;
use Xo\User\Auth;
use Xo\User\Valid;

use App\Config\AppConfig;
use App\Http\Controller\Controller;
use App\Http\Controller\Login;
use App\Http\View\Panel\ProfilView;
use App\Http\Model\User\User;

class Profil extends Controller
{
	function Index()
	{
		$err = '';

		try
		{
			// Only users with role 'user'
			$user = Login::IsAuthenticated(['user']);
			// print_r($user);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Error. </div>';
		}

		return ProfilView::Html(['err' => $err]);
	}
}