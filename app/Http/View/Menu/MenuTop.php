<?php
namespace App\Http\View\Menu;

use App\Http\View\Menu\MenuPanel;

class MenuTop
{
	static function Html(): string
	{
		$m = new MenuPanel();
		// Part
		$m->AddLink('/panel/orders', '/panel/orders/all', 'Orders');
		$m->AddSubLink('/panel/orders', '/panel/orders/all', 'All');
		$m->AddSubLink('/panel/orders', '/panel/orders/add', 'Add');
		// Part
		$m->AddLink('/panel/profil', '/panel/profil/info', 'Profil');
		$m->AddSubLink('/panel/profil', '/panel/profil/info', 'Info');
		$m->AddSubLink('/panel/profil', '/panel/profil/avatar', 'Avatar');
		$m->AddSubLink('/panel/profil', '/panel/profil/pass', 'Password');
		// Get html
		$main = $m->ShowMain();
		$sub = $m->ShowSub();

		return '
			<div class="menu-top">
				<div class="logo">
					<img src="/media/img/logo.png">
				</div>
				<div class="search">
					<input type="text" placeholder="Search" class="search-input">
				</div>
				<div class="notify">
					<div class="notify-icon"> <i class="fas fa-bell"></i> <span> 1 </span> </div>
					<div class="notify-icon"> <i class="fas fa-envelope"></i> <span> 23 </span> </div>
					<div class="notify-icon"> <i class="fas fa-comment"></i> <span> 69 </span> </div>
				</div>
				<div class="cogs">
					<i class="fas fa-cog"></i> <span> Settings </span>
				</div>
				<div class="avatar menu-top-show-popup">
					<img src="/media/img/avatar.jpg">

					<div class="menu-top-popup animate__animated animate__slideInRight">
						<a href="/panel/profil" class="popup-link"> <i class="fas fa-user"></i> Profil </a>
						<a href="/logout" class="popup-link"> <i class="fas fa-sign-out-alt"></i> Logout </a>
					</div>
				</div>
			</div>
			<div class="menu-bar" onclick="this.classList.toggle(\'menu-bar-open\')">
				<i class="menu-burger fas fa-bars"></i>
				'.$main.'
				<!--
				<a href="/panel/profil" class="menu-link menu-link-active">Profil</a>
				<a href="/panel/clients" class="menu-link">Clients</a>
				-->
			</div>
			<div class="submenu-bar">
				'.$sub.'
				<!--
				<a href="/panel/info" class="submenu-link submenu-link-active">Info</a>
				<a href="/panel/avatar" class="submenu-link">Avatar</a>
				-->
			</div>
		';
	}
}