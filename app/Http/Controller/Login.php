<?php
namespace App\Http\Controller;

use Exception;
use Xo\Db\Mysql\Db;
use Xo\User\Auth;
use Xo\User\Token;
use Xo\User\Valid;
use Xo\User\Activation;
use Xo\Mail\Send\SendEmail;
use Xo\Mail\Send\EmailTheme;

use App\Config\AppConfig;
use App\Http\View\Login\LoginView;
use App\Http\View\Login\RegisterView;
use App\Http\View\Login\ResetView;
use App\Http\Model\User\User;

class Login extends Controller
{
	function Index()
	{
		// Error
		$err = '';

		try
		{
			if(!empty($_POST))
			{
				$u = User::Login((string) $_POST['email'],(string) $_POST['pass'], 0);

				if($u->id > 0) {
					// Logged user data
					$_SESSION['logged_user'] = $u;
					// Redirect
					header('Location: /panel/profil');
				} else {
					$err = '<div class="error-input"> Invalid email or password. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input"> Invalid email or password. </div>';
		}

		// Get html
		return LoginView::Html(['err' => $err]);
	}

	function Register()
	{
		// Error
		$err = '';

		try
		{
			if(!empty($_POST))
			{
				$id = User::Register((string) $_POST['email'],(string) $_POST['pass'], (string) AppConfig::HOST);
				if($id > 0) {
					$err = '<div class="ok"> Account has been created. </div>';
				} else {
					$err = '<div class="error-input"> Invalid email or password. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input"> Invalid email address or account exists. </div>';
		}

		// Get html
		return RegisterView::Html(['err' => $err]);
	}

	function Reset()
	{
		// Error
		$err = '';

		try
		{
			if(!empty($_POST))
			{
				$id = User::Reset((string) $_POST['email'], (string) AppConfig::HOST);
				if($id > 0) {
					$err = '<div class="ok"> New password has been created. </div>';
				} else {
					$err = '<div class="error-input"> Invalid email address. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input"> Invalid email address. </div>';
		}

		// Get html
		return ResetView::Html(['err' => $err]);
	}
}