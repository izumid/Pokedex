<?php
class Ability{
	private  $_NameTarget	;
	private  $_Id			;
	private  $_Name			;
	private  $_Description	;
	//private  $_PowerPoints	;

	public function set_NameTarget	($_NameTarget)		{$this->_NameTarget	 = $_NameTarget		;}
	public function set_Id			($_Id)				{$this->_Id			 = $_Id				;}
	public function set_Name		($_Name)			{$this->_Name		 = $_Name			;}
	public function set_Description	($_Description)		{$this->_Description = $_Description	;}
	
	public function get_NameTarget	(){return $this->_NameTarget	;}
	public function get_Id			(){return $this->_Id			;}
	public function get_Name		(){return $this->_Name			;}
	public function get_Description	(){return $this->_Description	;}
	
	public function __construct( $_NameTarget,$_Id,$_Name,$_Description,){
		
		$this->set_NameTarget	($_NameTarget)	;
		$this->set_Id			($_Id)			;
		$this->set_Name			($_Name)		;
		$this->set_Description	($_Description)	;

		
	}
}
?>
<?php
	if(isset($_POST["IdAbility"],$_POST["NameAbilityTarget"],$_POST["NameAbility"],$_POST["DescriptionAbility"])){

		$nametarget		= $_POST["NameAbilityTarget"];
		$id				= $_POST["IdAbility"];
		$name 			= $_POST["NameAbility"];
		$description	= $_POST["DescriptionAbility"];

		

	$ability = new Ability($nametarget,$id,$name,$description);
		

		function insertData(Ability $ability){
			$db = 'history';
			$stmt = ("UPDATE history.ability SET IdAbility = :id, Name = :name, Description = :description WHERE Name = :nametarget");
			$param = array(
				":id" 			=> $ability->get_Id()			,
				":name" 		=> $ability->get_Name()			,
				":description"	=> $ability->get_Description()	,
				":nametarget" 	=> $ability->get_NameTarget()	,
			
				
				
			);
			

			$insertConnection =  new insertConnection($stmt, $param, $db);
			$insertConnection->insertDML();
			unset($insertConnection);

		}
	
		insertData($ability);
	}
?>