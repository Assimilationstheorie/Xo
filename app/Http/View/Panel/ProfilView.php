<?php
namespace App\Http\View\Panel;

use App\Http\Component\Html;
use App\Http\View\Menu\MenuTop;
use App\Http\View\View;

class ProfilView implements View
{
	static function Html(array $arr): string
	{
	}

	static function HtmlInfo(array $arr): string
	{
		$h = Html::Header('Profil', 'Profil', '', '');
		$h .= self::ShowInfo($arr['err'], $arr['user']);
		$h .= Html::Footer();
		return $h;
	}

	static function HtmlAvatar(array $arr): string
	{
		$h = Html::Header('Profil', 'Profil', '', '');
		$h .= self::ShowAvatar($arr['err'], $arr['uid']);
		$h .= Html::Footer();
		return $h;
	}

	static function HtmlPassword(array $arr): string
	{
		$h = Html::Header('Profil', 'Profil', '', '');
		$h .= self::ShowPassword($arr['err'], $arr['uid']);
		$h .= Html::Footer();
		return $h;
	}

	static function ShowInfo($err, $user)
	{
		return MenuTop::Html($user->id) . '
		<div class="content">
			<div class="box">
				<h1 class="animate__animated animate__fadeIn"> Info </h1>
				<p> Add some info about you. </p>

				<form class="panel-form"  method="post">
					<h3>Contact informations</h3>
					'.$err.'
					<label>Email addres (disabled)</label>
					<input type="text" placeholder="Enter email address" value="'.$user->email.'" disabled>

					<label>Alias</label>
					<input type="text" name="username" placeholder="Enter username">

					<label>Name</label>
					<input type="text" name="name" placeholder="Enter name">

					<label>Phone</label>
					<input type="text" name="mobile" placeholder="Enter phone">

					<label>Gender</label>
					<select name="gender">
						<option>Male</option>
						<option>Female</option>
					</select>

					<input type="submit" value="Save">
				</form>

				<form class="panel-form"  method="post">
					<h3>Address</h3>
					'.$err.'
					<label>Country</label>
					<input type="text" name="country" placeholder="Enter country">

					<label>City</label>
					<input type="text" name="city" placeholder="Enter city">

					<label>Address</label>
					<input type="text" name="address" placeholder="Enter address">

					<input type="submit" value="Save">
				</form>
			</div>
		</div>
		';
	}

	static function ShowPassword($err, $uid)
	{
		return MenuTop::Html($uid) . '
		<div class="content">
			<div class="box">
				<h1 class="animate__animated animate__fadeIn"> Password </h1>
				<p> Change your password. Password length min. 8 characters. </p>

				<form class="panel-form"  method="post">
					<h3>Change password</h3>
					'.$err.'
					<label>Current password</label>
					<input type="password" name="pass1" placeholder="Enter current password">

					<label>New password</label>
					<input type="password" name="pass2" placeholder="Enter new password">

					<label>Repeat new password</label>
					<input type="password" name="pass3" placeholder="Repeat new password">

					<input type="submit" value="Save">
				</form>
			</div>
		</div>
		';
	}

	static function ShowAvatar($err, $uid)
	{
		return MenuTop::Html($uid) . '
		<div class="content">
			<div class="box">
				<h1 class="animate__animated animate__fadeIn"> Avatar </h1>
				<p> Change avatar image. Max file size 2MB and extensions: jpg, png, webp. </p>

				<form class="panel-form"  method="post" enctype="multipart/form-data">
					<h3>Change avatar</h3>
					'.$err.'
					<label>Avatar</label>
					<div id="avatar-image">
						<img src="/media/images/avatar/avatar-'.$uid.'.webp" id="avatar-src" onerror="ErrorAvatar(this)">
					</div>

					<label>Choose image</label>
					<div id="btn-file-select" onclick="OpenFileInput()"> Select image: jpg, png or webp </div>
					<input type="file" name="file" placeholder="Enter current password" onchange="GetFileName(this)" id="file">

					<input type="submit" value="Save">
				</form>
			</div>
		</div>
		';
	}
}