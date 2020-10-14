<?php
namespace App\Http\View\Menu;

class MenuTop
{
	static function Html(): string
	{
		return '
			<div class="menu-top">
				<div class="logo">
					<img src="/media/img/cross.png">
				</div>
				<div class="search">
					<input type="text" placeholder="Search" class="search-input">
				</div>
				<div class="notify">
					<i class="fas fa-bell"></i>
				</div>
				<div class="cogs">
					<i class="fas fa-cog"></i> <span> Settings </span>
				</div>
				<div class="avatar">
					<img src="/media/img/cross.png">
				</div>
			</div>
		';
	}
}