<?php
	header('Content-Type: text/html; charset=utf-8');

	$db = new mysqli("localhost", "root", "9902061", "sample");
	$db->set_charset("utf8");

	function mq($sql5)
	{
		global $db;
		return $db->query($sql5);
	}
	?>