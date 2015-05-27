<?php
$call = (isset($_REQUEST["call"]) ? $_REQUEST["call"] : "error");
switch($call){
	case "login":
		$User = $this->getData("Select * from tbl_customer Where Username='" . $_REQUEST["Username"] . "' and Pwd='" . $_REQUEST["Pwd"] . "'");
		if (isset($User)){
			setcookie("User",md5($_REQUEST["Username"]),0,HOME_PATH);
			echo json_encode(array("error"=>"login successfully"));
		}else{
			setcookie("PHPSESSID","",0,HOME_PATH);
			setcookie("User","",0,HOME_PATH);
			echo json_encode(array("error"=>"Please enter correct username or password"));
		}
	break;
	case "signup":
		$reg = $this->setData("Insert into tbl_customer (Name,Username,Pwd,EMail) values ('" . $_REQUEST['txt_Name'] . "','" . $_REQUEST['txt_Username'] . "','" . md5($_REQUEST['txt_Password']) . "','" . $_REQUEST['txt_EMail'] . "')");
		if ($reg != ""){
			echo json_encode(array("error"=>"Username or email address already signed up"));
		}else{
			echo json_encode(array("error"=>"Signup successfully"));
		} 
	break;	
	default:
		echo json_encode(array("error"=>"In valid operation"));
	break;
}