<?php
namespace App\Http\View\Menu;

class MenuPanel
{
	public $MainLinks = [];
	public $SubLinks = [];

	function AddLink($main_url, $url, $name)
	{
		$url = rtrim($url, '/');
		$main_url = rtrim($main_url, '/');
		$hash = md5($main_url);

		$this->MainLinks[$hash] = ['url' => $url, 'name' => $name, 'main_url' => $main_url];
	}

	function AddSubLink($main_url, $url, $name)
	{
		$url = rtrim($url, '/');
		$main_url = rtrim($main_url, '/');
		$hash = md5($main_url);

		$this->SubLinks[$hash][] = ['url' => $url, 'name' => $name];
	}

	function GetUrl()
	{
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}

	// Get menu main part
	function ShowMain()
	{
		$url = $this->GetUrl();
		$curl = rtrim(dirname($url), '/');
		$hash = md5($url);
		$m = '';
		$h = '';
		foreach ($this->MainLinks as $k => $v) {
			if($v['main_url'] == $curl)
			{
				$m .= '<a href="'.$v['url'].'" class="menu-link menu-link-active">'.$v['name'].'</a>';
			}
			else
			{
				$h .= '<a href="'.$v['url'].'" class="menu-link">'.$v['name'].'</a>';
			}
		}
		return $m . $h;
	}

	// Get submenu part
	function ShowSub()
	{
		$curl = $this->GetUrl();
		$url = rtrim(dirname($curl), '/');
		$hash = md5($url);

		$h = '';
		foreach ($this->SubLinks[$hash] as $k => $v)
		{
			if($v['url'] == $curl)
			{
				$h .= '<a href="'.$v['url'].'" class="submenu-link submenu-link-active">'.$v['name'].'</a>';
			}
			else
			{
				$h .= '<a href="'.$v['url'].'" class="submenu-link">'.$v['name'].'</a>';
			}
		}
		return $h;
	}
}