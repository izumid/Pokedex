<?php
class Evolution{
	private $_NameTarget;
	private $_Id;
    private $_Name;
	private $_Description;

	public function get_Id(){
		return $this->_Id;
	}
	public function get_NameTarget(){
        return $this -> _NameTarget;
    }
    public function get_Name(){
        return $this -> _Name;
    }
	public function get_Description(){
		return $this -> _Description;
	}

	public function set_Id($_Id){
		$this->_Id = $_Id;
	}
	public function set_NameTarget($_NameTarget){
        $this -> _NameTarget = $_NameTarget;
    }
    public function set_Name($_Name){
        $this -> _Name = $_Name;
    }
	public function set_Description($_Description){
		$this -> _Description = $_Description;
	}

    public function __construct($_Id,$_NameTarget,$_Name, $_Description){
		$this -> set_Id     		($_Id)		;
		$this -> set_NameTarget     ($_NameTarget)		;
		$this -> set_Name           ($_Name)        	;
		$this -> set_Description    ($_Description) 	;
    }
}
/*$evo = new Evolution(23,"troca","ocorre quando o pokemon é trocado");
echo var_dump($evo);*/
?>

<?php
    if(isset($_POST["NameTarget"],$_POST["NameEvolution"], $_POST["IdEvolution"], $_POST["DescriptionEvolution"])){
        $nametarget		=$_POST["NameTarget"];
		$name			= $_POST["NameEvolution"];
		$IdEvo			= $_POST["IdEvolution"];
        $description 	= $_POST["DescriptionEvolution"];
        
        

        $Evolution = new Evolution($IdEvo,$nametarget,$name,$description);

        function insertData(Evolution $Evolution){
	    	$db = 'history';
	    	$stmt = ("UPDATE history.evolution SET IdEvolution = :idevo, Name = :name, Description = :description WHERE Name = :nametarget");
	    	$param = array(
				":idevo" 		=> $Evolution->get_Id()				,
	    		":name" 		=> $Evolution->get_Name()			,
	    		":description" 	=> $Evolution->get_Description()	,
				":nametarget" 	=> $Evolution->get_NameTarget()		,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($Evolution);
    }
?>