<?php
namespace App\Http\View\Menu;

class MenuTop
{
	static function Html(): string
	{
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
				<div class="avatar">
					<img src="/media/img/avatar.jpg">
				</div>
			</div>
			<div class="menu-bar" onclick="this.classList.toggle(\'menu-bar-open\')">
				<i class="menu-burger fas fa-bars"></i>

				<a href="/panel/profil" class="menu-link menu-link-active">Profil</a>
				<a href="/panel/clients" class="menu-link">Clients</a>
				<a href="/panel/addons" class="menu-link">Addons</a>
				<a href="/panel/categories" class="menu-link">Categories</a>
				<a href="/panel/products" class="menu-link">Products</a>
				<a href="/panel/posts" class="menu-link">Posts</a>
				<a href="/panel/settings" class="menu-link">Settings</a>
			</div>
			<div class="submenu-bar">
				<a href="/panel/addons" class="submenu-link submenu-link-active">Info</a>
				<a href="/panel/users" class="submenu-link">Avatar</a>
				<a href="/panel/orders" class="submenu-link">Address</a>
				<a href="/panel/products" class="submenu-link">Password</a>
			</div>
		';
	}
}