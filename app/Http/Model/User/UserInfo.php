<?php
namespace App\Http\Model\User;

use Exception;
use Xo\Db\Mysql\Db;
use Xo\User\Valid;

class UserInfo
{
	static function GetWithAlias(string $alias)
	{
		$arr = [
			':alias' => $alias
		];

		$sql = 'SELECT * FROM user_info WHERE alias = :alias LIMIT 1';

		return Db::Query($sql,$arr)->FetchObj();
	}

	static function GetWithId(int $id)
	{
		$arr = [
			':id' => $id
		];

		$sql = 'SELECT * FROM user_info WHERE rf_user_id = :id LIMIT 1';

		return Db::Query($sql,$arr)->FetchObj();
	}

	static function GetWithEmail(string $email)
	{
		Valid::Email($email);

		$arr = [
			':mail' => $email
		];

		$sql = 'SELECT * FROM user_info WHERE mail = :mail LIMIT 1';

		return Db::Query($sql,$arr)->FetchObj();
	}

	static function Create(int $user_id, string $alias = ''): int
	{
		if(empty($alias))
		{
			$alias = self::RandAlias();
		}

		Valid::Alias($alias);

		if($user_id <= 0)
		{
			throw new Exception("ERR_USER_ID", 1);
		}

		$arr = [
			':id' => $user_id,
			':alias' => $alias,
			':upalias' => $alias
		];

		$sql = 'INSERT INTO user_info(rf_user_id,alias) VALUES(:id,:alias) ON DUPLICATE KEY UPDATE alias=:upalias';

		return Db::Query($sql,$arr)->RowCount();
	}

	static function UpdateColumn(string $field, string $value, int $user_id): int
	{
		$field = preg_replace("/[^a-zA-z0-9_]/","",$field);

		$arr = [
			':id' => $user_id,
			':value' => $value
		];

		$sql = 'UPDATE user_info SET '.$field.' = :value WHERE rf_user_id = :id';

		return Db::Query($sql,$arr)->RowCount();
	}

	static function RandAlias()
	{
		return 'user.'.abs(crc32(uniqid()));
	}
}