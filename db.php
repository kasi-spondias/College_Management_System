<?php
error_reporting(0);
$db = new mysqli('localhost', 'root', '', 'college_management_system');
if($db->connect_errno){
	die('Sorry Database not connected !!!');
}
?>