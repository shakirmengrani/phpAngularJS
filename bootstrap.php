<?php 
class bootstrap{
	public $func;
	function __construct(){
		$this->func = new functions();
		$GLOBALS['url'] = explode("/",$_SERVER['REQUEST_URI']);
		// 3 = Folder
		// 4 = File
		$default_folder = "Index";
		$default_file = "view";
		$URLCount = count($GLOBALS['url']);
		$GLOBALS['url'][3] =  isset($GLOBALS['url'][3]) ? $GLOBALS['url'][3] : $default_folder;
		$GLOBALS['url'][4] = isset($GLOBALS['url'][4]) ? $GLOBALS['url'][4] : $default_file;		
		if ($GLOBALS['url'][3] == "reports" || $GLOBALS['url'][3] == "services"){
			if ($GLOBALS['url'][3] == "services" && $_SERVER['REQUEST_METHOD'] == "POST"){
				$this->func->render($GLOBALS['url'][3] . '/' . $GLOBALS['url'][4],false);	
			}else{
				header('HTTP/1.1 401 Unauthorized');
				echo "<h1>Unauthorized request method</h1>";
				// $this->func->render("error");
			}
		} else{
			$this->func->render($GLOBALS['url'][3] . '/' . $GLOBALS['url'][4]);	
		}
	}
}