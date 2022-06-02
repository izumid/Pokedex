<?php
require_once('conn.php');	

if(isset($_POST["searchBar"])){

    $searching	= $_POST["searchBar"];
    echo($searching);
    
    function selectData($searching){
        $db = 'history';
        $stmt = ("SELECT Speed FROM history.pokemon WHERE Name = :name ");
        $param = array(
            ":name" 		=> $searching,
        );
        
        $insertConnection =  new SelectConnection($stmt, $param, $db);
        $insertConnection->selectDML();
        unset($insertConnection);

    }

    selectData($searching);
}

class SelectConnection{
	
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

	public function selectDml(){
		
		function phpAlertDml($messageToPrint) {
			echo '<script type="text/javascript">alert("' . $messageToPrint . '")</script>';
		}

		$connection = new Connection($this->get_Database(),'root','');
		$connection->connMethod();
	
		try{
			$stmt = $connection->conn->prepare($this->get_Statement());
			//return $this->get_Statement()->execute($this->get_Parameter());
			$stmt->execute($this->get_Parameter());
            return $stmt->fetch();
			//phpAlertDml("Succesfuly Registred!!");
		}
		catch(PDOException $ex){
			phpAlertDml($ex->getMessage());
		}
		
		$connection = null;
		unset($connection);
	}
}
?>