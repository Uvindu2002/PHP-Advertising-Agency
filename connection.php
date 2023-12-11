<?php


$conn = new mysqli('localhost','root','','adworld');

if ($conn) {
	//echo "Connection successfull";
}else{
	die(mysql_errno($conn));
}

?>