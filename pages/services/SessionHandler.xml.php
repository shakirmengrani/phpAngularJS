<?php
if (isset($_COOKIE["User"])){
	echo json_encode(array("error"=>"Authorized"));
	//echo json_encode(array("error"=>"Unauthorized"));
}else{
	echo json_encode(array("error"=>"Authorized"));
	//echo json_encode(array("error"=>"Unauthorized"));
}