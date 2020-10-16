<?php
namespace App\Http\Model\Panel;

use Exception;
use Xo\Db\Mysql\Db;
use Xo\Img\Image;

class UploadAvatar
{
	static function Save()
	{
		$arr = [
			':uid' => $uid,
			':ip' => $ip,
			':info' => $info
		];

		$sql = 'INSERT INTO user_login(rf_user_id,ip,info) VALUES(:uid,:ip,:info)';

		return Db::Query($sql,$arr)->LastInsertId();
	}

	static function Upload(int $uid, string $file = '')
	{
		$dir = '/media/images/avatar/';
		$dest = $_SERVER['DOCUMENT_ROOT'].$dir;
		$pic = 'avatar-'.$uid.'.webp';
		$avatar = $dest.$pic;
		self::CreateDir($dest);

		if(file_exists($file)) {
			$img = new Image();
			$img->Load($file)->ResizeImage(256,256)->Save($avatar);
		}
		return $dir.$pic;
	}

	static function CreateDir(string $path = '')
	{
		mkdir($path,0775,true);
		return $path;
	}
}