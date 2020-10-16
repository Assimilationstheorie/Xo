<?php
namespace App\Http\View\Panel;

use App\Http\Component\Html;
use App\Http\View\Menu\MenuTop;
use App\Http\View\View;

class ProfilView implements View
{
	static function Html(array $arr): string
	{
		$h = Html::Header('Profil', 'Profil', '', '');
		$h .= self::Show($arr['err']);
		$h .= Html::Footer();
		return $h;
	}

	static function Show($err)
	{
		return MenuTop::Html() . '
		<div class="content">
			<div class="box">
				<h1 class="animate__animated animate__fadeIn"> Info </h1>
				<p> Add some info about you. </p>

				<form class="panel-form"  method="post">
					<h3>Contact informations</h3>

					<label>Alias</label>
					<input type="text" placeholder="Enter username">

					<label>Name</label>
					<input type="text" placeholder="Enter name">

					<label>Email addres</label>
					<input type="text" placeholder="Enter email address">

					<label>Phone</label>
					<input type="text" placeholder="Enter phone">

					<label>Gender</label>
					<select>
						<option>Male</option>
						<option>Female</option>
					</select>

					<input type="submit" value="Save">
				</form>

				<form class="panel-form"  method="post">
					<h3>Address</h3>

					<label>Country</label>
					<input type="text" placeholder="Enter country">

					<label>City</label>
					<input type="text" placeholder="Enter city">

					<label>Address</label>
					<input type="text" placeholder="Enter address">

					<input type="submit" value="Save">
				</form>
			</div>
		</div>
		';
	}
}