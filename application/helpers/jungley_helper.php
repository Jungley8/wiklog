<?php
/**
 * YLog 系统函数
 * @authors Jim Yeah (yejing@live.cn)
 * Copyright (c) 2015 http://www.iyejing.cn All rights reserved.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 字节格式化
 */
function file_size_count($size = 0, $dec = 2) {
	$a = array("B", "KB", "MB", "GB", "TB", "PB");
	$pos = 0;
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	}
	return round($size, $dec) . " " . $a[$pos];
}

function VD($var, $bool = true) {
	echo "<pre>";
	var_dump($var);
	echo "</pre>";

	!$bool OR die();
}

function alert_info($msg, $url = 0) {
	if ($url) {
		echo '<script>alert("' . $msg . '");location.href="' . $url . '";</script>';
	} else {
		echo '<script>alert("' . $msg . '");location.href=history.back();</script>';
	}
}

function tagstohtml($str, $separator = '、') {
	$html = '';
	if (!empty($str)) {
		$tags = explode($separator, $str);
		foreach ($tags as $value) {
			$html .= anchor('index/search/' . $value, $value, 'title="查看 $value 相关文章"');
		}
	}
	return $html;
}