<?php
namespace App\Http\View\Menu;

class Menu
{
	public $MainLinks = [];
	public $SubLinks = [];

	function AddLink($main_url, $url, $name)
	{
		$hash = md5($main_url);

		$this->MainLinks[$hash] = ['url' => $url, 'name' => $name, 'main_url' => $main_url];
	}

	function AddSubLink($main_url, $url, $name)
	{
		$hash = md5($main_url);

		$this->SubLinks[$hash][] = ['url' => $url, 'name' => $name];
	}

	function GetUrl()
	{
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}

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
		// print_r($this->MainLinks);
		// print_r($this->SubLinks);
		return $m . $h;
	}

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