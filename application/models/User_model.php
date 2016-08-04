<?php
/**
 * UserModel
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends WL_Model {
	private $tbname;

	function __construct() {
		parent::__construct();
		$this->tbname = $this->db->dbprefix('users');
	}

	/**
	 * 检查登录状态
	 * @return boolean true 登录，false 未登录
	 */
	public function check_signin() {
		$email = $this->input->post('email', TRUE);
		$passwd = $this->input->post('passwd', TRUE);
		$this->load->library('passwordhash', array(8, TRUE));

		$row = $this->db->select('id,passwd,name')
			->where('email', $email)
			->limit(1)
			->get($this->tbname)
			->row_array();
		if ($this->passwordhash->checkPassword($passwd, $row['passwd'])) {
			$this->session->set_userdata('uid', $row['id']);
			$this->session->set_userdata('name', $row['name']);
			$this->session->set_userdata('is_login', TRUE);

			$this->db->trans_start();

			$this->db->set('times', 'times+1', FALSE);
			$this->db->where('id', $row['id']);
			$this->db->update($this->tbname);

			$this->db->trans_complete();
			return $this->db->trans_status();
		} else {
			return FALSE;
		}
	}

	/**
	 * 根据ID获取用户信息
	 * @param  int $id 用户ID
	 * @return array
	 */
	public function get_user($id) {
		return $this->db->where('id', $id)
			->limit(1)
			->get($this->tbname)
			->row_array();
	}

	/**
	 * 获取所有用户信息
	 * @return array
	 */
	public function get_users() {
		$users = array();
		$query = $this->db->get($this->tbname);
		foreach ($query->result_array() as $row) {
			$users[$row['id']] = $row;
		}
		return $users;
	}

	/**
	 * 更新用户信息
	 * @param  int $id 用户ID
	 * @return boolean     是否修改成功
	 */
	public function update_user($id) {
		$this->load->library('passwordhash', array(8, TRUE));
		$this->db->trans_start();

		$post = $this->input->post();

		unset($post['oldpasswd']);
		unset($post['passwd2']);
		isset($post['passwd']) && $post['passwd'] = $this->passwordhash->HashPassword($post['passwd']);

		$post['updated_at'] = time();

		$this->db->where('id', $id);
		$this->db->update($this->tbname, $post);
		$this->db->trans_complete();

		isset($post['name']) && $this->session->set_userdata('name', $post['name']);
		return $this->db->trans_status();
	}

}
