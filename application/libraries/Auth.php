<?php


class Auth {

	private $CI;

	public function __construct() {
		$this->CI = &get_instance();
		//$this->CI->load->model('admin/User_Model');
		//$this->CI->load->helper('ip_helper');
	}

	public function isLogin($dataCheck) {
		//echo "<pre>";
		// print_r($this->CI->custom_session);
		// exit;
		$userData = $this->CI->custom_session->custom_userdata($dataCheck);
		return (!empty($userData))?true:false;
	}

	public function isLoginCheck($type = '', $dataCheck) {
		// var_dump($datacheck);
		// exit;
		$check = $this->isLogin($dataCheck);

		if ($type == 'login') {
			if ($check) {
				redirect_to('admin/home');
			}
		} else {
			if (!$check) {
				redirect_to('admin/login');
			}
		}
	}

	function logout($field, $url, $email_id) {
		$arrTimeOut = array();
		$arrTimeOut = array('logout_time' => date("y-m-d h:i:s:"));
		$this->CI->User_Model->logout_model($arrTimeOut, $email_id);
		$this->CI->custom_session->custom_unset_userdata($field);
		redirect_to($url);
	}

	function formatted_userdata($field) {
		$userData = $this->CI->custom_session->custom_userdata($field);
		// var_dump($userData);
		// exit;
		$arrUser = array();
		if (count($userData) > 0) {
			$arrUser = $this->CI->Admin_Model->getUserDetail($userData['id']);
			// var_dump($arrUser);
			// exit;
			if (count($arrUser)) {
				$arrUser = $arrUser;
			}
		}
		return $arrUser;
	}


}
