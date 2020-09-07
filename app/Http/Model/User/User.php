<?php
namespace App\Http\Model\User;

use Xo\User\Auth;
use Xo\User\Valid;
use Xo\User\Activation;
use Xo\Mail\Send\SendEmail;
use Xo\Mail\Send\EmailTheme;

class User
{
	/**
	 * Login
	 *
	 * @param string $email Email address
	 * @param string $pass Password
	 * @param string $algo Hash algorithm
	 * @return object User object or 0
	 */
	static function Login(string $email, string $pass, string $algo = 'md5')
	{
		Valid::Email($email);
		$user = Auth::Get($email);
		if($user->pass == Auth::PassHash($pass, $algo) && $user->active == 1 && $user->baned == 0 && $user->closed == 0)
		{
			return $user;
		}
		return 0;
	}

	/**
	 * Register - Create new account
	 *
	 * @param string $email Email address
	 * @param string $pass Password
	 * @param string $subject Message subject
	 * @param string $algo Hash algo
	 * @return int Created User id or 0
	 */
	static function Register(string $email, string $pass, string $domain, string $subject = 'Activation', string $algo = 'md5')
	{
		Valid::Email($email);
		Valid::Pass($pass);
		$uid = (int) Auth::Create($email, $pass, self::Ip(), $algo);
		if($uid > 0)
		{
			self::SendActivationEmail($uid,$email,$subject, $domain);
		}
		return $uid;
	}

	/**
	 * Reset - Change user password
	 *
	 * @param string $email Email address
	 * @param string $subject Message subject
	 * @param string $algo Hash algo
	 * @return int If updated 1 else 0
	 */
	static function Reset(string $email, string $subject = 'New password', string $algo = 'md5')
	{
		$ok = 0;
		Valid::Email($email);
		$user = Auth::Get($email);
		if($user->id > 0)
		{
			$pass = uniqid();
			$ok = Auth::UpdateColumn('pass', Auth::PassHash($pass, $algo), $user->id);
			if($ok > 0)
			{
				self::SendResetEmail($email, $pass, $subject);
			}
		}
		return $ok;
	}

	/**
	 * ActivateAccount - Set user table column active to 1
	 *
	 * @param string $code Activation code
	 * @return int True if ok, false if error
	 */
	static function ActivateAccount(string $code)
	{
		Valid::Empty($code);
		$user = Activation::GetWithCode($code);
		if($user->rf_user_id > 0)
		{
			$u = Auth::GetWithId($user->rf_user_id);
			if($u->active > 0)
			{
				return 1;
			}
			// Update if not activated
			return Auth::UpdateColumn('active', 1, $user->rf_user_id);
		}
		return 0;
	}

	/**
	 * SendActivationEmail - Send email with password
	 *
	 * @param string $email Email address
	 * @param string $pass Password
	 * @param string $subject Message subject
	 * @return void
	 */
	protected static function SendActivationEmail(int $uid, string $email, string $subject, string $domain)
	{
		if($uid > 0)
		{
			$code = uniqid();
			Activation::Create($uid, $code, self::Ip());
			SendEmail::Send($email, strip_tags($subject), EmailTheme::Get('media/email/activation.html', ['{DOMAIN}' => rtrim($domain, '/'), '{CODE}' => $code]));
		}
	}

	/**
	 * SendResetEmail - Send email with password
	 *
	 * @param string $email Email address
	 * @param string $pass Password
	 * @param string $subject Message subject
	 * @return void
	 */
	protected static function SendResetEmail(string $email, string $pass, string $subject)
	{
		SendEmail::Send($email, strip_tags($subject), EmailTheme::Get('media/email/resetpass.html', ['{PASS}' => $pass]));
	}

	/**
	 * Ip - remote user ip address
	 *
	 * @return string Ip address
	 */
	static function Ip()
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
		return strip_tags($ip);
	}
}

/*
$u = User::Login('5f567a7968930@woo.xx','password');
if($u->id > 0)
{
	echo "Logged!!! Token: " . Token::Update($u->id)->token . " ";
}

$user = User::Register(uniqid().'@woo.xx', 'password', 'domain.xx');
print_r($user);

echo User::ActivateAccount('5f567c61bd41d');
*/