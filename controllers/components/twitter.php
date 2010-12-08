<?php

App::import('Vendor', 'Twitter', array('file'=>'twitter' . DS . 'twitter.php') );

class TwitterComponent extends Object {
	var $consumerKey = 'OtAzROz6FxJk3UrCHEYAfA';
	var $consumerSecret = 'Et9k5yfCsU2U8PkVRLRMfbIjcMncLzc2njU3jIBPQ';
	var $oauth_token = '221053188-xBcccgcFsOATc7RtIjfNOqDfsvmX2IQAM7xSeoF3';
	var $oauth_token_secret = 'tujZhEPdaBPOZOlcEvmJmJONTI3Hl8Qt8UdOLvfN5HI';

	function postRequest($org, $item, $quantity, $type, $url) {
		$key = array('{ORG}', '{ITEM}', '{QUANTITY}', '{TYPE}');
		$value = array($org, $item, $quantity, $type);
		$template = "{ORG} requested:
{ITEM}: {QUANTITY} {TYPE}.";
		$contents = str_replace($key, $value, $template);
		$twitter = new Twitter($this->consumerKey, $this->consumerSecret, $this->oauth_token, $this->oauth_token_secret);

		return $twitter->updateStatus($contents, $url);
	}
}