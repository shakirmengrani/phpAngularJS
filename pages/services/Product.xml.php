<?php 
$products = $this->getData("Select A.Name As Category,B.* from tbl_category As A inner join tbl_product As B On A.ID=B.Cat_ID Order by B.Date Desc");
echo json_encode($products);