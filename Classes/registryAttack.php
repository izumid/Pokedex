<?php

class Attack{
	private  $_Name				;
	private  $_IdType			;
	private  $_Category			;
	private  $_Power			;
	private  $_PowerPoints		;
	private  $_Accuracy			;
	private  $_Description		;

	public function set_Name		($_Name)		{$this->_Name 			= $_Name				;}
	public function set_IdType		($_IdType)		{$this->_IdType 		= $_IdType				;}
	public function set_Category	($_Category)	{$this->_Category 		= $_Category			;}
	public function set_PowerPoints	($_PowerPoints)	{$this->_PowerPoints 	= $_PowerPoints			;}
	public function set_Power		($_Power)		{$this->_Power 			= $_Power				;}
	public function set_Accuracy	($_Accuracy)	{$this->_Accuracy 		= $_Accuracy			;}
	public function set_Description	($_Description)	{$this->_Description	= $_Description			;}

	public function get_Name		(){return $this->_Name			;}
	public function get_Category	(){return $this->_Category		;}
	public function get_PowerPoints	(){return $this->_PowerPoints	;}
	public function get_Power		(){return $this->_Power			;}
	public function get_Accuracy	(){return $this->_Accuracy		;}
	public function get_IdType		(){return $this->_IdType		;}
	public function get_Description	(){return $this->_Description	;}
	
	public function __construct($_Name,$_IdType,$_Category,$_PowerPoints,
	 $_Power,$_Accuracy,$_Description){
		$this->set_Name			($_Name)		;
		$this->set_IdType		($_IdType)		;
		$this->set_Category		($_Category)	;
		$this->set_PowerPoints	($_PowerPoints)	;
		$this->set_Power		($_Power)		;
		$this->set_Accuracy		($_Accuracy)	;
		$this->set_Description	($_Description)	;
	}
}
?>

<?php

	if(isset($_POST["Name"], $_POST["Type"],$_POST["Category"],$_POST["PowerPoints"],
	$_POST["Power"],$_POST["Accuracy"],$_POST["Description"])){

		$name			= $_POST["Name"];
		$type 			= $_POST["Type"];
		$category 		= $_POST["Category"];
		$powerpoints	= $_POST["PowerPoints"];
		$power 			= $_POST["Power"];
		$accuracy 		= $_POST["Accuracy"];
		$description 	= $_POST["Description"];

		$attack = new Attack($name,$type,$category,$powerpoints,$power,$accuracy,$description);
		//echo var_dump($attack);

		function insertData(Attack $attack){
			$db = 'history';
			$stmt = ("INSERT INTO history.attack VALUES(NULL,:name, :idtype, :category,
			 :powerpoints, :power, :accuracy,:description)");
			$param = array(
				":name" 		=> $attack->get_Name()			,
				":idtype" 		=> $attack->get_IdType()		,
				":category" 	=> $attack->get_Category()		,
				":powerpoints" 	=> $attack->get_PowerPoints()	,
				":power" 		=> $attack->get_Power()			,
				":accuracy" 	=> $attack->get_Accuracy()		,
				":description"	=> $attack->get_Description()	,
			);
			

			$insertConnection =  new insertConnection($stmt, $param, $db);
			$insertConnection->insertDML();
			unset($insertConnection);

		}
	
		insertData($attack);
	}
?>