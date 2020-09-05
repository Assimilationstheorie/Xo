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
			// echo SendEmail::Send('to@local.host', 'Subject', '<html>Html message here</html>');

			// Mysql
			// $row = Db::Query("SELECT * FROM users WHERE id = :id", [':id' => 1])->Fetch();

			// From Controller
			$pa = $this->ParseUri();
			$id = $this->UriParam(2);

			// Get html
			return HomeView::Html(['id' => $id, 'pa' => $pa, 'row' => $row]);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}