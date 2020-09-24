<?php
namespace App\Http\View;

use App\Http\View\LeftMenu;
use App\Http\Component\Html;

use App\Http\Component\Cart\Cart;
use App\Http\Component\Cart\Addon;
use App\Http\Component\Cart\Product;

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

		// self::Cart();

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

	static function Cart()
	{
		// Addons
		$a = new Addon(1, 2, 1.50, 1, 'Słuchawki', 0);
		echo "Addon cost " . $a->TotalCost() . "<br>";

		$a1 = new Addon(2, 1, 2.50, 1, 'Myszka', 2.40);
		echo "Addon cost " . $a1->TotalCost() . "<br>";

		// Product
		$p = new Product(1, 2, 15.44, 2, 'Phone', 15.22);
		$p->Addon($a);
		$p->Addon($a1);
		echo "Product cost " . $p->TotalCost() . "<br>";

		// Cart
		$c = new Cart(9.99, 1100);
		$c->Add($p);
		$c->Add($p);

		echo "<br>";
		echo "Products cost " . $c->ProductsCost() . "<br>";
		echo "Packing cost " . $c->PackingCost() . "<br>";
		echo "Delivery cost " . $c->DeliveryCost() . "<br>";
		echo "Cart cost " . $c->TotalCost() . "<br>";
	}
}