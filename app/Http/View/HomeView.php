<?php
namespace App\Http\View;

use App\Http\View\LeftMenu;
use App\Http\Component\Html;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// Header
		$h = Html::Header('Page title', 'Page description', 'home,page', '');

		// Html
		$h .= '<h1> It Works ... </h1>';

		// Sample form
		$h .= self::ShowForm();

		// Animations
		$h .= self::Animate();

		// Add menu
		// $h .= LeftMenu::Html();

		$h .= Html::Footer();

		return $h;
	}

	static function ShowForm()
	{
		return '
		<form method="post">
			<h2>Awesome</h2>

			<div class="notice notice-main"> <i class="fas fa-exclamation"></i> Your account has been created. </div>
			<div class="error-input">Invalid email address.</div>

			<label>Email addres</label>
			<input type="text" placeholder="Enter email address">

			<label>Password</label>
			<input type="password" placeholder="Enter password">

			<label>Gender</label>
			<select>
				<option>Male</option>
				<option>Female</option>
			</select>

			<label>Message</label>
			<textarea placeholder="Enter message"></textarea>

			<!--
			<input type="checkbox" name="scales" checked>
			<input type="radio" name="drone" value="huey" checked>
			<input type="radio" id="dewey" name="drone" value="dewey">
			-->

			<label>Privacy policy</label>
			<div class="checkbox" data-value="1" onclick="this.classList.toggle(\'checkbox-selected\')"><div class="checkbox-dot"></div></div>

			<label>Email notifications</label>
			<div class="checkbox checkbox-selected" data-value="2" onclick="this.classList.toggle(\'checkbox-selected\')"><div class="checkbox-dot"></div></div>

			<input type="submit" value="Button">
		</form>';
	}

	static function Animate()
	{
		return '
		<h1>Animations</h1>
		<div class="center">
			<div class="blob color">+</div>
		</div>
		<div class="center">
			<div class="blob-rotate">+</div>
		</div>
		<div class="center">
			<div class="blob-scale">+</div>
		</div>
		<div class="center">
			<div class="radar"></div>
		</div>
		<div class="center">
			<a class="a-usderscore">Underscore link</a>
		</div>
		<div class="center">
			<a class="a-usderscore-left">Underscore link</a>
		</div>
		';
	}
}