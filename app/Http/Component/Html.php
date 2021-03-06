<?php
namespace App\Http\Component;

class Html
{
	static function Header($title = '', $description = '', $keywords = '', $metatags = '')
	{
return '<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index,follow">
    <title>'.$title.'</title>
	<meta name="description" content="'.$description.'">
    <meta name="keywords" content="'.$keywords.'">
    <meta name="author" content="">
	<link rel="shortcut icon" href="/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon/favicon.ico" type="image/x-icon">
	<link rel="canonical" href="https://domain.xx">

    <!-- Og -->
    <meta property="og:type" content="website">
	<meta property="og:title" content="">
	<meta property="og:site_name" content="">
	<meta property="og:url" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="https://domain.xx/logo.png">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@User">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://domain.xx/logo.png">

	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link async href="https://fonts.googleapis.com/css2?family=Exo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link async href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">

	<link href="/style.css" rel="stylesheet">
	<script defer src="/main.js" type="module"></script>
	<script src="/func.js"></script>
	'.$metatags.'
</head>
<body>
';
	}

	static function Footer()
	{
return '
	<div id="footer">
			All rights reserved.
	</div>
</body>
</html>
';
	}
}
