<?php
class Ability{
	private  $_Name			;
	private  $_Description	;

	public function set_Name		($_Name)			{$this->_Name		 = $_Name			;}
	public function set_Description	($_Description)		{$this->_Description = $_Description	;}

	public function get_Name		(){return $this->_Name			;}
	public function get_Description	(){return $this->_Description	;}
	
	public function __construct( $_Name,$_Description,){
		$this->set_Name			($_Name)		;
		$this->set_Description	($_Description)	;
	}
}
?>
<?php
	if(isset($_POST["Name"],$_POST["DescriptionAb"])){
		$name 		 = $_POST["Name"];
		$description = $_POST["DescriptionAb"];		

	$ability = new Ability($name,$description);
		
		function insertData(Ability $ability){
			$db = 'history';
			$stmt = ("INSERT INTO history.ability VALUES(NULL,:name, :description)");
			$param = array(
				":name" 		=> $ability->get_Name()			,
				":description"	=> $ability->get_Description()	,
			);
			
			$insertConnection =  new insertConnection($stmt, $param, $db);
			$insertConnection->insertDML();
			unset($insertConnection);
		}
		insertData($ability);
	}
?>