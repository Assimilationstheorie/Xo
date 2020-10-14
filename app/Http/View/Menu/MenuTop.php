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
		';
	}
}