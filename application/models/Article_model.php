<?php
/**
 *  ����ģ��
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
	 * ������ĿID��ȡ�����б�
	 * @param  integer $id ��ĿID
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
	 * ����ID��ȡ������Ϣ
	 * @param  int $id ����ID
	 * @return array
	 */
	public function get_article($id) {
		return $this->db->where('id', $id)
			->limit(1)
			->get($this->tbname)
			->row_array();
	}

	/**
	 * ���ݹؼ��ʻ�ȡ�������
	 * @param  string $keyword �ؼ���
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