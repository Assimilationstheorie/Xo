<?php
namespace App\Http\Controller\Panel;

use Exception;
use Xo\User\Auth;
use Xo\User\Valid;
use Xo\Db\Mysql\Db;

use App\Config\AppConfig;
use App\Http\Controller\Controller;
use App\Http\Controller\Login;
use App\Http\View\Panel\ProfilView;
use App\Http\Model\User\User;

use App\Http\Model\Panel\UploadAvatar;

class Profil extends Controller
{
	function Info()
	{
		$err = '';

		try
		{
			// Only users with role 'user' or 'admin'
			$user = Login::IsAuthenticated(['user', 'admin']);

		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Error. </div>';
		}

		return ProfilView::HtmlInfo(['err' => $err, 'uid' => $user->id, 'user' => $user]);
	}

	function Password()
	{
		$err = '';

		try
		{
			// Only users with role 'user' or 'admin'
			$user = Login::IsAuthenticated(['user', 'admin']);

			if(!empty($_POST)) {
				$ok = User::UpdatePassword((int) $user->id, $_POST['pass1'], $_POST['pass2'], $_POST['pass3']);
				if($ok > 0) {
					$err = '<div class="ok animate__animated animate__flipInX"> Password has been updated. </div>';
				} else {
					$err = '<div class="error-input animate__animated animate__flipInX"> Enter new password. Password length min. 8 characters. </div>';
				}
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Error update. </div>';
		}

		return ProfilView::HtmlPassword(['err' => $err, 'uid' => $user->id]);
	}

	function Avatar()
	{
		$err = '';
		$user = null;
		$avatar = '';

		try
		{
			// Only users with role 'user' or 'admin'
			$user = Login::IsAuthenticated(['user', 'admin']);

			$file = $_FILES['file']['tmp_name'];
			$images = AppConfig::IMAGES_TYPES;
			if(file_exists($file)) {
				$type = $_FILES['file']['type'];
				if(in_array($type,$images)) {
					$avatar = UploadAvatar::Upload((int) $user->id, (string) $file);
				}else{
					throw new Exception("Error Upload", 1);
				}
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			$err = '<div class="error-input animate__animated animate__flipInX"> Ups! Upload error. </div>';
		}

		return ProfilView::HtmlAvatar(['err' => $err, 'uid' => $user->id]);
	}
}