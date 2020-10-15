<?php
namespace App\Sms;

use Exception;

class JustSend
{
	public $response = '';

	/**
	 * Send sms - JustSend.pl
	 */
	static function Send(int $number, string $msg = 'Hello sms', string $api_key, string $info = 'Info', bool $double_encode = true, string $sms_type = "ECO")
	{
		try
		{
			$curl = new JustSendClient();
			$curl->SetMethod("POST");
			$curl->SetJson();
			$curl->AddToken($api_key);
			$curl->AddUrl('https://justsend.pl/api/rest/v2/message/send');
			// Mesage
			$curl->AddData("to", $number);
			$curl->AddData("message", $msg);
			$curl->AddData("from", $info);
			// Sms type
			$curl->AddData("bulkVariant", $sms_type); // ECO, PRO, FULL
			$curl->AddData("doubleEncode", $double_encode);
			// Send
			self::$response = $curl->Send();
			return 1;
		}
		catch(Exception $e)
		{
			return 0;
		}
	}

	static function SendPro(int $number, string $msg = 'Hello sms', string $api_key, string $info = 'Info', bool $double_encode = true)
	{
		return self::Send($number, $api_key, $double_encode, "PRO");
	}
}