<?php
namespace App\Http\Controller;

use Xo\Db\Mysql\Db;
use Xo\Mail\Send\SendEmail;
use App\Http\View\HomeView;

class Homepage extends Controller
{
	function Index()
	{
		try
		{
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
			return HomeView::Html(['id' => $id, 'pa' => $pa]);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}