<?php
/**
 * 栏目模型
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends WL_Model {
	private $tbname;

	function __construct() {
		parent::__construct();
		$this->tbname = $this->db->dbprefix('categories');
	}

	/**
	 * 根据ID获取栏目信息
	 * @param  int $id 栏目ID
	 * @return array
	 */
	public function get_category($id) {
		return $this->db->where('id', $id)
			->limit(1)
			->get($this->tbname)
			->row_array();
	}
	/**
	 * 获取所有栏目信息
	 * @param  integer $pid 父栏目ID
	 * @return array
	 */
	public function get_categories($pid = 0) {
		$res = $this->db
			->select('id,title,type,sort,description,display,parent_id')
			->get($this->tbname)
			->result_array();
		return $this->_get_categories($res);
	}

	/**
	 * 递归按层级排列栏目信息
	 * @param  array  $res   所有栏目信息
	 * @param  integer $id    栏目ID
	 * @param  integer $level 层级
	 * @return array
	 */
	private function _get_categories($res, $id = 0, $level = 0) {
		static $categories = array();
		foreach ($res as $row) {
			if ($row['parent_id'] == $id) {
				$row['level'] = $level;
				$categories[] = $row;
				$this->_get_categories($res, $row['id'], $level + 1);
			}
		}
		return $categories;
	}

}