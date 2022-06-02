<?php
class TypeRelationship{
    
    private $_IdType;

    public function get_IdType(){
        return $this -> _IdType;
    }

    public function set_IdType($_IdType){
        $this -> _IdType = $_IdType;
    }

    public function __construct( $_IdType){ 
        $this -> set_IdType($_IdType);
    }
}


?>

<?php
	if(isset($_POST["Type"])){

		$type = $_POST["Type"];
		
        $TypeRelationship = new TypeRelationship($type);

            function insertData(TypeRelationship $TypeRelationship){
    	    	$db = 'history';
    	    	$stmt = ("INSERT INTO dimension.typerelationship VALUES(NULL,:idtype)");
    	    	$param = array(
    	    		":idtype" => $TypeRelationship->get_IdType(),
    	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($TypeRelationship);
    }
?>