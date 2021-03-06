<?php
namespace App\Sms;

use Exception;

class SmsApi
{
	function __construct(string $token)
	{
		$this->Token = $token;
	}

	/**
	 * Send sms - SmsApi.pl
	 *
	 * use App\Sms\SmsApi;
	 * $sms = new SmsApi(AppConfig::SMSAPI_TOKEN);
	 * $res = $sms->Send(AppConfig::SMSAPI_NOTIFIY_NUMBER, 'New order: ', '', 'Info', true);
	 */
	function Send($to, $msg, $msg_url = '', $info = 'Info', $backup = false)
	{
		$url = '';
		if(!empty($msg_url)) {
			$url = '[%idzdo:'.$msg_url.'%]';
		}

		$params = array(
			'to' => $to, //numery odbiorców rozdzielone przecinkami
			'message' => rtrim($msg . ' ' . $url), //treść wiadomości
			'from' => $info, //pole nadawcy
			'format' => 'json'
		);

		if ($backup == true) {
			$url = 'https://api2.smsapi.pl/sms.do';
		} else {
			$url = 'https://api.smsapi.pl/sms.do';
		}

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $params);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_HTTPHEADER, array(
			"Authorization: Bearer " . $this->Token
		));

		$this->Result = curl_exec($c);
		$this->StatusCode = curl_getinfo($c, CURLINFO_HTTP_CODE);

		if ($this->StatusCode != 200 && $backup == false) {
			$backup = true;
			sms_send($params, $token, $backup);
		}

		// Error message
		if (curl_errno($c)) {
			$this->Error = curl_error($c);
			throw new Exception('CURL_ERROR '.$this->Error, $this->StatusCode);
		}
		curl_close($c);
		return $this->Result;
	}
}