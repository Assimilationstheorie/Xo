# Xo project
Php mvc composer project.

### Composer howto
```sh
# cache clear
composer clearcache

# create new project in dir
composer create-project moovfun/xo ./api

# optional
cd api
composer update
composer dump-autoload -o
```

### Run in browser
```
cd api
php -S localhost:8000 -t ./public
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

## Controller class
Homepage.php
```php
<?php
namespace App\Http\Controller;

use Xo\Db\Mysql\Db;
use Xo\User\Auth;
use Xo\User\Valid;
use Xo\Mail\Send\SendEmail;
use Xo\Mail\Send\EmailTheme;

class Homepage extends Controller
{
	function Index()
	{
		try
		{
			// Bearer token authorization
			$user = Auth::IsAuthorized();

			// Validate
			Valid::Email('email@local.host');

			// Send email
			$ok = SendEmail::Send('email@local.host', 'Subject', '<html>Html message here</html>');
			$ok = SendEmail::Send('email@local.host', 'Subject', EmailTheme::Get('media/email/resetpass.html', ['{PASS}' => 'password']));

			// Mysql query
			$row = Db::Query("SELECT * FROM users WHERE id = :id", [':id' => 1])->Fetch();
			$rows = Db::Query("SELECT * FROM users WHERE id > :id", [':id' => 0])->FetchAll();
			$lid = Db::Query("INSERT INTO users(email,pass) VALUES(:e,:p)", [':e' => 'email@page.xx', ':p' => md5('password')])->LastInsertId();

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
HomeView.php
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

### Nginx server
```sh
server {
	disable_symlinks off;
	client_max_body_size 100M;
	keepalive_timeout 300;

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

### Curl
```
# GET
curl -X GET http://domain.xx -H "Authorization: Bearer 61e51229-f13c-11ea-9db7-7e44772edd6d"
# POST, PUT
curl -X POST http://domain.xx -H "Authorization: Bearer 61e51229-f13c-11ea-9db7-7e44772edd6d"
# Login
curl -X POST -d "email=5f567a7968930@woo.xx&pass=password" http://domain.xx/api/auth
# Form data
-d "id=123&name=Jimbo" -H "Content-Type: application/x-www-form-urlencoded"
# Json data
-d '{"key1":"value1", "key2":"value2"}' -H "Content-Type: application/json"
```

## REST API

### Login
```
Url: /api/auth
POST: {email}, {pass}
Return: token

curl -X POST -d "email=5f567a7968930@woo.xx&pass=password" http://domain.xx/api/auth
```

### Logged user info
```
Url: /api/user/info
POST: "Authorization: Bearer {token}"
Return: user object

curl -X POST -H "Authorization: Bearer c7451263-f99a-11ea-a3e7-f2c7e188c9d9" http://xo.xx/api/user/info
```

### Get user profil with id
```
Url: /api/user/info/id
POST: {id}
Return: user info

curl -X POST http://xo.xx/api/user/info/id -d "id=88"
```

### Get user profil with alias
```
Url: /api/user/info/alias
POST: {alias}
Return: user info

curl -X POST http://xo.xx/api/user/info/alias -d "alias=username"
```

### Get user profil with public email
```
Url: /api/user/info/email
POST: {email}
Return: user info

curl -X POST http://xo.xx/api/user/info/email -d "email=user@domain.xx"
```