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

use App\Http\View\DemoView;
use App\Http\Model\User\User;

class Demo extends Controller
{
	function Index()
	{
		try
		{
			// echo Token::BearerToken();
			// $user = Auth::IsAuthorized();
			// print_r($user);

			// Activation
			// Activation::Create(1, 'code123', '127.0.0.1');
			// $u = Activation::GetWithCode('code123');

			// Token
			// $u = Token::Update(1);
			// $u = Token::Get($u->token);

			// Auth
			// $email = uniqid().'@woo.xx';
			// Create user
			// Valid::Email($email);
			// $id = (int) Auth::Create($email,'password');
			// Update user
			// echo Auth::UpdateColumn('pass', 'updated', $id);
			// Login
			// $user = Auth::Get($email);
			// echo $user->pass;

			// Send email
			// $ok = SendEmail::Send('to@local.host', 'Subject', '<html>Html message here</html>');

			// Mysql select
			// $row = Db::Query("SELECT * FROM user WHERE id = :id", [':id' => 1])->Fetch();
			// $rows = Db::Query("SELECT * FROM user WHERE id > :id", [':id' => 0])->FetchAll();
			// Mysql insert
			// $arr = [':e' => rand(0,9999).'email@page.xx', ':p' => md5('pass'), ':i' => '127.0.0.1'];
			// $lid = Db::Query("INSERT INTO user(email,password,ip) VALUES(:e,:p,:i)", $arr)->LastInsertId();

			// Methods from controller
			$pa = $this->ParseUri();
			$id = $this->UriParam(2);

			// Get html
			return DemoView::Html(['id' => $id, 'pa' => $pa]);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}