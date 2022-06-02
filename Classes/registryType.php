<?php
class TYPE{
	private $_Name;
	
	function get_Name(){ return $this ->_Name; }
	function set_Name($_Name){ $this -> _Name = $_Name;}
	
	function __construct($_Name){ $this -> set_Name($_Name); }

}

?>

<?php

	if (isset($_POST["TypeName"])) {
		
		$name = $_POST["TypeName"];
		

			$type = new Type($name);
			//echo var_dump($type);
		
			function insertData(Type $type){
				$db = 'history';
				$stmt = ("INSERT INTO history.type VALUES(NULL, :name)");
				$param = array(":name" 	=> $type->get_Name());
				
				$insertConnection = new InsertConnection($stmt, $param, $db);
				$insertConnection->insertDml();
				unset($insertConnection);
			}
			
		insertData($type);
	}

?>
