<?php
namespace App\Http\View;

use App\Http\View\LeftMenu;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		$h = "<h1> It Works ... </h1>";

		// Sample form
		$h .= self::ShowForm();

		// Add menu
		// $h .= LeftMenu::Html();

		return $h;
	}

	static function ShowForm()
	{
		return '
		<link href="/style.css" rel="stylesheet">
		<script defer src="/main.js"></script>

		<form method="post">
			<h2>Awesome</h2>
			<label>Email addres</label>
			<input type="text" placeholder="Enter email address">
			<label>Password</label>
			<input type="password" placeholder="Enter password">
			<label>Gender</label>
			<select>
				<option>MALE</option>
				<option>FEMALE</option>
			</select>
			<label>Message</label>
			<textarea placeholder="Enter message"></textarea>
			<input type="checkbox" name="scales" checked>
			<input type="radio" name="drone" value="huey" checked>
			<input type="radio" id="dewey" name="drone" value="dewey">
			<input type="submit" value="Button">
		</form>';
	}
}