<?php
namespace App\Http\Controller;

use Exception;
use App\Config\AppConfig;
use App\Http\View\Login\LoginView;
use App\Http\View\Login\RegisterView;
use App\Http\View\Login\ResetView;
use App\Http\View\Login\ActivationView;
use App\Http\Model\User\User;

class Login extends Controller
{
	static function IsAuthenticated(array $role = ['user'])
	{
		if(empty($_SESSION['logged_user'])) {
			self::LogoutNow();
		} else {
			$user = $_SESSION['logged_user'];
			// Error user
			if(!is_object($user) || $user->id <= 0 || !in_array($user->role, $role)) {
				self::LogoutNow();
			}
			// Banned user
			if($user->baned > 0) {
				self::BanedNow();
			}
			// Account closed
			if($user->closed > 0) {
				self::ClosedNow();
			}
			return $user;
		}
	}

	static function LogoutNow()
	{
		unset($_SESSION['logged_user']);
		unset($_SESSION);
		session_destroy();
		header('Location: /login');
		die();
	}

	static function BanedNow()
	{
		header('Location: /error/baned');
		die();
	}

	static function ClosedNow()
	{
		header('Location: /error/closed');
		die();
	}

	function Logout()
	{
		self::LogoutNow();
	}

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
					// Unset pass
					unset($u->pass);
					// Logged user data
					$_SESSION['logged_user'] = $u;
					// Redirect
					header('Location: /panel/profil');
				} else {
					$err = '<div class="error-input animate__animated animate__flipInX"> Invalid email or password. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Invalid email or password. </div>';
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
					$err = '<div class="ok animate__animated animate__tada"> Account has been created. </div>';
				} else {
					$err = '<div class="error-input animate__animated animate__flipInX"> Invalid email or password. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Invalid email address or account exists. </div>';
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
					$err = '<div class="ok animate__animated animate__tada"> New password has been created. </div>';
				} else {
					$err = '<div class="error-input animate__animated animate__flipInX"> Invalid email address. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Invalid email address. </div>';
		}

		// Get html
		return ResetView::Html(['err' => $err]);
	}

	function Activation()
	{
		// Error
		$err = '';
		// Secret code
		$code = $this->UriParam(2);

		try
		{
			if(!empty($code)) {
				$ok = User::ActivateAccount((string) $code);

				if($ok > 0) {
					$err = '<div class="ok animate__animated animate__tada"> Account has been activated. </div>';
				}else{
					$err = '<div class="error-input animate__animated animate__flipInX"> Invalid code. Try reset password. </div>';
				}
			} else {
				$err = '<div class="error-input animate__animated animate__flipInX"> Invalid code string. </div>';
			}
		}
		catch(Exception $e)
		{
			// $err = $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Invalid code. Try reset password. </div>';
		}

		// Get html
		return ActivationView::Html(['err' => $err]);
	}
}