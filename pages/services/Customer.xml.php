<?php 
$_REQUEST['call'] = (isset($_REQUEST['call']) ? $_REQUEST['call'] : "error");
switch($_REQUEST['call']){
	case "auth":
		$customer = $this->getData("Select * from tbl_customer where Username='" . $_REQUEST['user'] . "' and Pwd='" . $_REQUEST['pwd'] . "'");
		echo json_encode($customer);	
	break;
	case "getAll":
		$customer = $this->getData("Select * from tbl_customer");
		echo json_encode($customer);	
	break;	
	default:
		$err = array("error"=>"Invalid operation");
		echo json_encode($err);
	break;
}
