<?php
class Evolution{

    private $_Name;
	private $_Description;

 
    public function get_Name(){
        return $this -> _Name;
    }
	public function get_Description(){
		return $this -> _Description;
	}

    public function set_Name($_Name){
        $this -> _Name = $_Name;
    }
	public function set_Description($_Description){
		$this -> _Description = $_Description;
	}

    public function __construct($_Name, $_Description){
        $this -> set_Name           ($_Name)        ;
		$this -> set_Description    ($_Description) ;
    }
}
/*$evo = new Evolution(23,"troca","ocorre quando o pokemon é trocado");
echo var_dump($evo);*/
?>

<?php
    if(isset($_POST["Name"], /*$_POST["Number"],*/ $_POST["DescriptionEvo"])){
        $name			= $_POST["Name"];
		/*$idEvo			= $_POST["Number"];*/
        $description 	= $_POST["DescriptionEvo"];
        
        

        $Evolution = new Evolution($name,$description);

        function insertData(Evolution $Evolution){
	    	$db = 'history';
	    	$stmt = ("INSERT INTO history.evolution VALUES(NULL,:name, :description)");
	    	$param = array(
	    		":name" 		=> $Evolution->get_Name()			,
	    		":description" 	=> $Evolution->get_Description()	,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($Evolution);
    }
?>