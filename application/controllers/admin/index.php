<?php
/**
 * 后台首页
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends WL_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['db_prefix'] = $this->db->dbprefix;
		$data['db_version'] = $this->db->version();
		$data['db_platform'] = $this->db->platform();
		$data['upload_size'] = ini_get('upload_max_filesize');
		$data['software'] = $this->input->server('SERVER_SOFTWARE');
		$data['client_ip'] = $this->input->ip_address();
		// $this->output->enable_profiler(TRUE);

		$this->load->library('user_agent');
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} elseif ($this->agent->is_robot()) {
			die();
			$agent = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = '无法识别来访客户';
		}

		$data['agent'] = $agent;
		$data['platform'] = $this->agent->platform();

		$this->_view('admin/index', $data);

	}
}