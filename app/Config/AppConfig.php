<?php
namespace App\Config;

class AppConfig
{
	// Mysql
	const MYSQL_HOST = 'localhost';
	const MYSQL_PORT = '3006';
	const MYSQL_DBNAME = 'homestead';
	const MYSQL_USER = 'root';
	const MYSQL_PASS = 'toor';

	// Smtp (default localhost without pass)
	const SMTP_USER = '';
	const SMTP_PASS = '';
	const SMTP_HOST = '127.0.0.1';
	const SMTP_PORT = 25; // 25, 587, 465
	const SMTP_FROM_EMAIL = 'no-reply@woo.xx';
	const SMTP_FROM_USER = 'Welcome';
	const SMTP_TLS = false; // true - enabled ssl connection
	const SMTP_AUTH = false; // true - enabled authentication
	const SMTP_DEBUG = 0; // Or 1 - enabled

	// Domain host
	const HOST = 'xo.xx';
	const IMAGES_TYPES = ['image/jpeg', 'image/png', 'image/webp'];

	// SmsApi
	const SMSAPI_TOKEN = '';
	const SMSAPI_NOTIFIY_NUMBER = '';
}