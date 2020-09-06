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

			// Mysql query
			// $row = Db::Query("SELECT * FROM users WHERE id = :id", [':id' => 1])->Fetch();
			// $rows = Db::Query("SELECT * FROM users WHERE id > :id", [':id' => 0])->FetchAll();
			// $lid = Db::Query("INSERT INTO users(email,pass) VALUES(:e,:p)", [':e' => 'email@page.xx', ':p' => md5('pass')])->LastInsertId();

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