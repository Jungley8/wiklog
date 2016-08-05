<?php
/**
 *  文章模型
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends WL_Model {

	private $tbname;

	function __construct() {
		parent::__construct();
		$this->tbname = $this->db->dbprefix('articles');
	}

	/**
	 * 根据栏目ID获取文章列表
	 * @param  integer $id 栏目ID
	 * @return array
	 */
	public function get_articles($id = 0) {
		$this->db->select("id,title,parent_id,user_id,publish_at,description,tags");
		if ($id) {
			$this->db->where('parent_id', $id);
		}
		$query = $this->db->get($this->tbname);

		$articles = array();

		foreach ($query->result_array() as $row) {
			$articles[$row['id']] = $row;
		}
		return $articles;
	}

	/**
	 * 根据ID获取文章信息
	 * @param  int $id 文章ID
	 * @return array
	 */
	public function get_article($id) {
		return $this->db->where('id', $id)
			->limit(1)
			->get($this->tbname)
			->row_array();
	}

	/**
	 * 根据关键词获取相关文章
	 * @param  string $keyword 关键词
	 * @return array
	 */
	public function search_articles($keyword) {
		return $this->db
			->select("id,title,parent_id,user_id,publish_at,description,tags")
			->like('title', $keyword)
			->or_like('description', $keyword)
			->get($this->tbname)->result_array();
	}
}