<?php
namespace App\Http\Controller;

use App\Http\View\HomeView;
use Xo\Db\Mysql\Db;

class Homepage extends Controller
{
    function Index()
    {
        // From Controller
        $pa = $this->ParseUri();
		$id = $this->UriParam(2);

		// Mysql
		$row = Db::Query("SELECT * FROM users WHERE id = :id", [':id' => 1])->Fetch();

        // Get html
        return HomeView::Html(['id' => $id, 'pa' => $pa, 'row' => $row]);
    }
}