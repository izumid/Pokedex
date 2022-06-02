<?php
include('conn.php');	

class InsertConnection{
	
	private $_Statement;
	private $_Parameter;
	private $_Database;
	
	function set_Statement($_Statement){ $this -> _Statement = $_Statement;}
	function set_Parameter($_Parameter){ $this -> _Parameter = $_Parameter;}
	function set_Database($_Database){ $this -> _Database = $_Database;}
	
	function get_Statement(){ return $this ->_Statement; }
	function get_Parameter(){ return $this ->_Parameter; }
	function get_Database()	{ return $this -> _Database; }
	
	function __construct($_Statement,$_Parameter,$_Database){ 
		$this -> set_Statement($_Statement); 
		$this -> set_Parameter($_Parameter); 
		$this -> set_Database($_Database); 
	}

	public function insertDml(){
		
		function phpAlertDml($messageToPrint) {
			echo '<script type="text/javascript">alert("' . $messageToPrint . '")</script>';
		}

		$connection = new Connection($this->get_Database(),'root','');
		$connection->connMethod();
	
		try{
			$stmt = $connection->conn->prepare($this->get_Statement());		
			return $stmt->execute($this->get_Parameter());
		}
		catch(PDOException $ex){
			phpAlertDml($ex->getMessage());
		}

		$connection = null;
		unset($connection);	
	}
/*
	public function insertAssociation(){
		
		function phpAlertAssociation($messageToPrint) {
			echo '<script type="text/javascript">alert("' . $messageToPrint . '")</script>';
		}

		$connection = new Connection($this->get_Database(),'root','');
		$connection->connMethodAss();
	
		try{
			$stmt = $connection->conn->prepare($this->get_Statement());		
			return $stmt->execute($this->get_Parameter());
		}
		catch(PDOException $ex){
			phpAlertAssociation($ex->getMessage());
		}

		$connection = null;
		unset($connection);
					
		
	}
*/

}
?>

