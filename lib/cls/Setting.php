<?php

class Setting {

	public function __construct($array) {
		if (isset($array['email'])) {
			$this->email = $array['email'];
		}
		if (isset($array['phone'])) {
			$this->phone = $array['phone'];
		}
		if (isset($array['address'])) {
			$this->address = $array['address'];
		}
		if (isset($array['city'])) {
			$this->city = $array['city'];
		}
		if (isset($array['state'])) {
			$this->state = $array['state'];
		}
		if (isset($array['zip'])) {
			$this->zip = $array['zip'];
		}
	}

	public $email = '';
	public $phone = '';
	public $address = '';
	public $city = '';
	public $state = '';
	public $zip = '';
}
?>