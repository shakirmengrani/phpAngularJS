<?php 
$categories = $this->getData("Select * from tbl_category");
echo json_encode($categories);