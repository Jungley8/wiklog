<?php
/**
 * 前台核心模型
 * @authors Jungley (yejing@live.cn)
 * Copyright (c) 2016 http://www.jungley.net All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class WL_Model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function get_text($id)
  {
    return $this->db->where('id',$id)
                    ->limit(1)
                    ->get('texts')
                    ->row_array();
  }
}
