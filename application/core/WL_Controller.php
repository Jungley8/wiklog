<?php
/**
 * 前台核心控制器
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class WL_Controller extends CI_Controller {
	private $copyright = 'Powered By WikLog';
	private $version = '0.0.1';

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper(array('url', 'form', 'string', 'jungley'));
		define('IS_LOGIN', isset($_SESSION['is_login']) ? TRUE : FALSE);
		$this->check_login();
	}

	public function _view($template, $data = array()) {

		$data['copyright'] = $this->copyright;
		$data['version'] = $this->version;
		$data['name'] = $this->session->userdata('name');

		$this->load->view($template, $data);
	}

	public function check_login() {
		if (FALSE === IS_LOGIN) {
			redirect('sso/signin');
		}
	}

}
