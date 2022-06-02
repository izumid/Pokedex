<?php
class Type{
	private $_Id;
	private $_Name;
	private $_NameTarget;
	
	function get_Id(){ return $this ->_Id; }
	function get_Name(){ return $this ->_Name; }
	function get_NameTarget(){ return $this ->_NameTarget; }

	function set_Id($_Id){ $this -> _Id = $_Id;}
	function set_Name($_Name){ $this -> _Name = $_Name;}
	function set_NameTarget($_NameTarget){ $this -> _NameTarget = $_NameTarget;}
	
	function __construct($_Id,$_Name,$_NameTarget){ 
		$this -> set_Id($_Id);
		$this -> set_Name($_Name); 
		$this -> set_NameTarget($_NameTarget);
	}

}

?>

<?php

	if (isset($_POST["IdType"],$_POST["TypeName"],$_POST["TypeNameTarget"])) {
		$Id = $_POST["IdType"];
		$Name = $_POST["TypeName"];
		$NameTarget = $_POST["TypeNameTarget"];	

		$type = new Type($Id,$Name,$NameTarget);
		//echo var_dump($type);
	
		function insertData(Type $type){
			$db = 'history';
			$stmt = ("UPDATE history.type SET IdType = :id, Name = :name WHERE Name = :nameTarget");
			$param = array(
				":id"	 		=> $type->get_Id(),
				":name" 		=> $type->get_Name(),
				":nameTarget" 	=> $type->get_NameTarget()
			);
			
			$insertConnection = new InsertConnection($stmt, $param, $db);
			$insertConnection->insertDml();
			unset($insertConnection);
		}
			
		insertData($type);
	}

?>
