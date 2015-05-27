<?php
$orders = $this->getData("Select * From tbl_order where CustId=" . $_REQUEST['CustId']);
echo json_encode($orders);