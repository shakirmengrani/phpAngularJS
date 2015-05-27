<?php
class functions{
	// Database connection
	private $db;
	public function __construct(){
		$this->db = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
	}
// Page Rendering functions start
	function getHeader(){
		require 'pages/headerfooter/header.html';
	}
	function getFooter(){
		require 'pages/headerfooter/footer.html';
	}
	public function render($page,$headerfooter = true){
		if (file_exists("pages/" . $page . ".php")){
			if ($headerfooter == true){
				$this->getHeader();
			}
			require "pages/" . $page . ".php";
			if ($headerfooter == true){
				//echo "<script src='pages/" . $page . ".js'></script>";
				$this->getFooter();
			}
		}else{
			require "pages/Error/404.html";		
		}		
	}
// Page Rendering functions end
// DAL start
	public function getData($sql){
		$Data = array();
		$result = mysqli_query($this->db,$sql);
		if (!@ $result){
			return $result;
		}else{ 
			while($row = mysqli_fetch_array($result,1)){
				array_push($Data,$row);
			}
			return $Data;
		}
	}
	public function setData($sql){
		$result = mysqli_query($this->db,$sql);
		$err = mysqli_error($this->db);
		return $err;
	}
//print_r(getData($db,"Select * From tbl_product"));
//echo setData("Insert");
//DAL end	
}