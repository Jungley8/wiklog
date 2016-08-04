<?php
/**
 * SSO控制器
 * @authors Jungle (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Sso extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper(array('url', 'form', 'jungley'));
		$this->load->model('user_model');
	}

	public function signin() {
		if (TRUE === $this->session->userdata('is_login')) {
			redirect('/admin/index');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', '邮箱', 'required|valid_email'
			// |is_exits[users.email]',
			// array('is_exits' => '不存在该邮箱账号')
		);
		$this->form_validation->set_rules('passwd', '密码',
			array(
				'required',
				array('check_signin', array($this->user_model, 'check_signin')),
			),
			array('check_signin' => '邮箱或密码错误')
		);
		// $this->form_validation->set_rules('captcha', '验证码', 'required|callback_check_captcha');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('signin');
		} else {
			redirect('admin/index');
		}
	}

	public function check_captcha($str) {
		$this->load->library('captcha');
		if (!$this->captcha->check($str)) {
			$this->form_validation->set_message('check_captcha', '验证码错误');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function signout() {
		session_destroy();
		redirect('sso/signin');
	}

	public function signup() {
		# code...
		# 注册
	}
}
