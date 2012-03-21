<?php

$sesambung = mysql_connect("localhost","root","");
mysql_select_db("perdagangan_elektronik",$sesambung);


$action = $_POST['action'];

if($action == 'check_username')
{
	$u = $_POST['username'];
	_check_username($u);
}

function _check_username($u)
{
	$un = mysql_query("SELECT kode FROM pengguna");
	if(in_array($u, $un))
	{
		echo "<span class='no'><strong>{$u}</strong> is not available</span>";
	}
	else
	{
		echo "<span class='yes'><strong>{$u}</strong> is available</span>";
	}
}
?>