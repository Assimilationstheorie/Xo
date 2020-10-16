<?php
namespace App\Http\Model\User;

use Exception;
use Xo\Db\Mysql\Db;

class Log
{
	static function Now(int $uid, string $ip, string $info)
	{
		$arr = [
			':uid' => $uid,
			':ip' => $ip,
			':info' => $info
		];

		$sql = 'INSERT INTO user_login(rf_user_id,ip,info) VALUES(:uid,:ip,:info)';

		return Db::Query($sql,$arr)->LastInsertId();
	}
}