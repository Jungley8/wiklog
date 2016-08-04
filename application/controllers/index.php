<?php
/**
 * 首页控制器
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper(array('url', 'form', 'jungley'));
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('category_model');

		// 获取所有用户信息
		$this->data['users'] = $this->user_model->get_users();
		// 获取所有栏目信息
		$this->data['categories'] = $this->category_model->get_categories();
	}

	public function index() {
		// 获取全站文章列表
		$this->data['articles'] = $this->article_model->get_articles();

		$this->load->view('frontend/index', $this->data);
	}

	public function article($id = '') {
		// 获取单篇文章信息
		$this->data['article'] = $this->article_model->get_article($id);

		$this->load->view('frontend/article', $this->data);
	}

	public function category($id = '') {
		// 获取指定栏目文章列表
		$this->data['articles'] = $this->article_model->get_articles($id);
		$this->load->view('frontend/category', $this->data);
	}

	public function search($keyword = '') {
		if (empty($keyword)) {
			echo "关键词不能为空";
			return false;
		}
		// 获取指定栏目文章列表
		$this->data['keyword'] = $keyword;
		$this->data['results'] = $this->article_model->search_articles($keyword);
		$this->load->view('frontend/search', $this->data);
	}
}