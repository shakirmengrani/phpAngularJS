<?php session_start(); ?>
<pre>
<?php print_r($_SESSION['cart']); ?>
</pre>
<?php 
if (isset($_SESSION["cart"][2])){
	$_SESSION["cart"][2]["Qty"] = 5;
}

//unset($_SESSION["cart"][2]);

?>