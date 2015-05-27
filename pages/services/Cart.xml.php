<?php
$call = isset($_REQUEST["call"]) ? $_REQUEST["call"] :  "error";
switch($call){
	case "add":
		$ItemInfo = $this->getData("Select * from tbl_product where ID=" . $_REQUEST["ItemId"]);
		$custId = $_REQUEST["CustId"];
		$ItemId = $_REQUEST["ItemId"];
		$Price = $ItemInfo[0]["Price"];
		$Discount = (isset($_REQUEST["Discount"]) ?  $_REQUEST["Discount"] : (isset($ItemInfo[0]["Discount"]) ? $ItemInfo[0]["Discount"] : 0));
		$Qty = (isset($_REQUEST["Qty"]) ? $_REQUEST["Qty"] : 1) ;
		if (isset($_SESSION["cart"][$ItemId])){
			$_SESSION["cart"][$ItemId]["Qty"] = $Qty;
		}else{
			$_SESSION['cart'][$ItemId] = array(
				"CustId"=>$custId,
				"ItemId"=>$ItemId,
				"ItemName"=>$ItemInfo[0]["Name"],
				"Price"=>$Price,
				"Discount"=>$Discount,
				"Qty"=>$Qty
			);
		}
		echo json_encode(array("error"=>"Added"));
	break;
	case "remove":
		unset($_SESSION["cart"][$_REQUEST["ItemId"]]);
		echo json_encode(array("error"=>"Removed"));
	break;
	case "get":
		$cartData = array();
		foreach($_SESSION['cart'] as $val){
			$Item = array(
				"ID"=>$val["ItemId"],
				"Name"=>$val["ItemName"],
				"Price"=>$val["Price"],
				"Discount"=>$val["Discount"],
				"Net"=>($val["Price"] - $val["Discount"]),
				"Qty"=>$val["Qty"]
			);
			array_push($cartData,$Item);
		}
		echo json_encode($cartData);
	break;
	default:
		echo json_encode(array("error"=>"invalid operation"));
	break;
}
