<?php
namespace App\Http\Model\User;

use Xo\User\Auth;
use Xo\User\Valid;
use Xo\User\Activation;
use Xo\Mail\Send\SendEmail;
use Xo\Mail\Send\EmailTheme;
use App\Http\Model\User\UserInfo;

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
	static function Login(string $email, string $pass, $on_token = 1, string $algo = 'md5')
	{
		Valid::Email($email);

		$user = Auth::Get($email);
		if($user->pass == Auth::PassHash($pass, $algo) && $user->active == 1)
		{
			// Log user
			Log::Now((int) $user->id, (string) self::Ip(), (string) $_SERVER['HTTP_USER_AGENT']);

			// Token
			if($on_token)
			{
				// Create or update token, expiration time 1 hour.
				$t = Token::Update($user->id);
				$user->token = $t->token;
			}
			return $user;
		}
		return 0;
	}

	/**
	 * Register - Create new account
	 *
	 * @param string $email Email address
	 * @param string $pass Password
	 * @param string $domain Your domain hostname
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
			UserInfo::Create($uid); // user info with random alias
			self::SendActivationEmail($uid,$email,$subject,$domain);
		}
		return $uid;
	}

	/**
	 * Reset - Change user password
	 *
	 * @param string $email Email address
	 * @param string $domain Your domain hostname
	 * @param string $subject Message subject
	 * @param string $algo Hash algo
	 * @return int If updated 1 else 0
	 */
	static function Reset(string $email, string $domain, string $subject = 'New password', string $algo = 'md5')
	{
		Valid::Email($email);
		$user = Auth::Get($email);
		if($user->id > 0)
		{
			$pass = uniqid();
			$ok = Auth::UpdateColumn('pass', Auth::PassHash($pass, $algo), $user->id);
			if($ok > 0)
			{
				self::SendResetEmail($email, $pass, $subject, $domain);
			}
			return $ok;
		}
		return 0;
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
	 * Update user password
	 *
	 * @param string $curr_pass Current password
	 * @param string $pass1 New pass
	 * @param string $pass2 New pass
	 * @param integer $len Pass length min. 8
	 * @return int True or false
	 */
	static function UpdatePassword(int $uid, $curr_pass, $pass1, $pass2, $len = 8)
	{
		if(!empty($curr_pass) && !empty($pass1) && $pass1 == $pass2 && strlen($pass1) >= $len)
		{
			$pass = md5($pass1);
			$cpass = md5($curr_pass);
			$user = Auth::GetWithId($uid);
			if($user->pass == $cpass) {
				return Auth::UpdateColumn('pass', $pass, $uid);
			}
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
	protected static function SendResetEmail(string $email, string $pass, string $subject, string $domain)
	{
		SendEmail::Send($email, strip_tags($subject), EmailTheme::Get('media/email/resetpass.html', ['{DOMAIN}' => rtrim($domain, '/'), '{PASS}' => $pass]));
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