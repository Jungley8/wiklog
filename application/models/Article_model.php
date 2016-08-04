<?php
/**
 *  文章模型
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class article_model extends CI_model {

	private $tbname = 'articles';

	function __construct() {
		parent::__construct();
	}

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

	public function get_article($id) {
		return $this->db->where('id', $id)
			->limit(1)
			->get($this->tbname)
			->row_array();
	}
}