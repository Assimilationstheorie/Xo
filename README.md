# Xo project
Php mvc composer project.

### Composer howto
```sh
# cache clear
composer clearcache

# create new project in dir
composer create-project moovfun/xo ./xo

# optional
cd xo
composer update
composer dump-autoload -o
```

### Directories
```sh
# App config
/app/Config
# App php controllers, views, models
/app/Http
# Routes
/routes/web.php
# Server document root (alow symlinks)
/public
```

### Nginx server
```sh
server {
	disable_symlinks off;
	client_max_body_size 100M;
	keepalive_timeout 60;

	listen 80;
	listen [::]:80;
	root /var/www/html/domain.xx/public;
	server_name domain.xx www.domain.xx;
	index index.php;

	location = /favicon.ico {
		rewrite . /favicon/favicon.ico;
	}

	location ~ /(Cache|cache|vendor|.git) {
		deny all;
		return 404;
	}

	location / {
		# Get file or folder or redirect uri to url param in index.php
		try_files $uri $uri/ /index.php?url=$uri&$args;
	}

	location ~ \.php$ {
		# Php-fpm
		include snippets/fastcgi-php.conf;
		fastcgi_pass unix:/run/php/php7.4-fpm.sock;
	}

	# Tls redirect
	# return 301 https://$host$request_uri;
	# return 301 https://domain.xx$request_uri;
}
```

## Controller class
```php
<?php
namespace App\Http\Controller;

use Xo\Db\Mysql\Db;
use Xo\Mail\Send\SendEmail;
use App\Http\View\HomeView;

class Homepage extends Controller
{
	function Index()
	{
		try
		{
			// Send email
			$ok = SendEmail::Send('to@local.host', 'Subject', '<html>Html message here</html>');

			// Mysql query
			$row = Db::Query("SELECT * FROM users WHERE id = :id", [':id' => 1])->Fetch();
			$rows = Db::Query("SELECT * FROM users WHERE id > :id", [':id' => 0])->FetchAll();
			$lid = Db::Query("INSERT INTO users(email,pass) VALUES(:e,:p)", [':e' => 'email@page.xx', ':p' => md5('pass')])->LastInsertId();

			// Methods from controller
			$pa = $this->ParseUri();
			$id = $this->UriParam(2);

			// Get html class
			return HomeView::Html(['id' => $id, 'pa' => $pa]);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
```

## View class
```php
<?php
namespace App\Http\View;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// print_r($arr);

		return " ! Hello from HomeView page ! " . $arr['id'];
	}
}
```