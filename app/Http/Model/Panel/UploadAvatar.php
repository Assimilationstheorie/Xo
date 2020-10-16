<?php
namespace App\Http\Model\Panel;

use Exception;
use Xo\Db\Mysql\Db;
use Xo\Img\Image;

class UploadAvatar
{
	static function SaveAvatar()
	{
		$arr = [
			':uid' => $uid,
			':img' => $img,
			':img1' => $img
		];

		$sql = 'INSERT INTO user_avatar(rf_user_id,img_url) VALUES(:uid,:img) ON DUPLICATE KEY UPDATE img_url = :img1';

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