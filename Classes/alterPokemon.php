<?php
	class Pokemon{
		private	$_NameTarget		;
		private	$_Id				;
		private	$_Name				;
		private	$_Gender			;
		private	$_Type				;
		private	$_Type2				;
		private	$_TypeTarget		;
		private	$_Type2Target		;
		private	$_Height			;
		private	$_Weight			;
		private	$_HealthPoints		;
		private	$_Attack			;
		private	$_Defence			;
		private	$_SpecialAttack		;
		private	$_SpecialDefence	;
		private	$_Speed				;
		//private	$_Image				;
		private	$_Description		;
		
		public function get_NameTarget		(){return $this->_NameTarget	;}
		public function get_Id				(){return $this->_Id			;}
		public function get_Name			(){return $this->_Name			;}
		public function get_Gender			(){return $this->_Gender		;}
		public function get_Type			(){return $this->_Type			;}
		public function get_Type2			(){return $this->_Type2			;}
		public function get_TypeTarget		(){return $this->_TypeTarget	;}
		public function get_Type2Target		(){return $this->_Type2Target	;}
		public function get_Height			(){return $this->_Height		;}
		public function get_Weight			(){return $this->_Weight		;}
		public function get_HealthPoints	(){return $this->_HealthPoints	;}
		public function get_Attack			(){return $this->_Attack		;}
		public function get_Defence			(){return $this->_Defence		;}
		public function get_SpecialAttack	(){return $this->_SpecialAttack	;}
		public function get_SpecialDefence	(){return $this->_SpecialDefence;}
		public function get_Speed			(){return $this->_Speed			;}
		//public function get_Image			(){return $this->_Image			;}
		public function get_Description		(){return $this->_Description	;}

		public function set_NameTarget		($_NameTarget)		{$this->_NameTarget 	= $_NameTarget			;}
		public function set_Id				($_Id)				{$this->_Id 			= $_Id					;}
		public function set_Name			($_Name)			{$this->_Name 			= $_Name				;}
		public function set_Gender			($_Gender)			{$this->_Gender			= $_Gender				;}
		public function set_Clas			($_Clas)			{$this->_Clas 			= $_Clas				;}
		public function set_Type			($_Type)			{$this->_Type 			= $_Type				;}
		public function set_Type2			($_Type2)			{$this->_Type2 			= $_Type2				;}
		public function set_TypeTarget		($_TypeTarget)		{$this->_TypeTarget 	= $_TypeTarget			;}
		public function set_Type2Target		($_Type2Target)		{$this->_Type2Target 	= $_Type2Target			;}
		public function set_Height			($_Height)			{$this->_Height			= $_Height				;}
		public function set_Weight			($_Weight)			{$this->_Weight			= $_Weight				;}
		public function set_HealthPoints	($_HealthPoints)	{$this->_HealthPoints	= $_HealthPoints		;}
		public function set_Attack			($_Attack)			{$this->_Attack 		= $_Attack				;}
		public function set_Defence			($_Defence)			{$this->_Defence 		= $_Defence				;}
		public function set_SpecialAttack	($_SpecialAttack)	{$this->_SpecialAttack 	= $_SpecialAttack		;}
		public function set_SpecialDefence	($_SpecialDefence)	{$this->_SpecialDefence = $_SpecialDefence		;}
		//public function set_Image			($_Image)			{$this->_Image 			= $_Image				;}
		public function set_Speed			($_Speed)			{$this->_Speed 			= $_Speed				;}
		public function set_Description		($_Description)		{$this->_Description	= $_Description			;}

		public function __construct($_NameTarget, $_Id,$_Name, $_Gender,$_Type,$_Type2,$_TypeTarget,$_Type2Target,$_Height, $_Weight, $_HealthPoints, $_Attack, $_Defence, $_SpecialAttack, $_SpecialDefence, $_Speed, $_Description,/*$_Image*/){

			$this->set_NameTarget		($_NameTarget)		;		
			$this->set_Id				($_Id)				;
			$this->set_Name				($_Name)			;
			$this->set_Gender			($_Gender)			;
			$this->set_Type				($_Type)			;
			$this->set_Type2			($_Type2)			;
			$this->set_TypeTarget		($_TypeTarget)		;
			$this->set_Type2Target		($_Type2Target)	;
			$this->set_Height			($_Height)			;
			$this->set_Weight			($_Weight)			;
			$this->set_HealthPoints		($_HealthPoints)	;
			$this->set_Attack			($_Attack)			;
			$this->set_Defence			($_Defence)			;
			$this->set_SpecialAttack	($_SpecialAttack)	;
			$this->set_SpecialDefence	($_SpecialDefence)	;
			$this->set_Speed			($_Speed)			;
			$this->set_Description		($_Description)		;
			//$this->set_Image			($_Image)			;
		
			
		}
	}
?>


<?php
	

	if(
		
		isset( 
				$_POST["Id"],$_POST["NamePokemon"],$_POST["Gender"],
				$_POST["Type1Target"],
				$_POST["Height"],$_POST["Weight"],$_POST["HealthPoints"],$_POST["Attack"],
				$_POST["Defense"],$_POST["SpecialAttack"],$_POST["SpecialDefense"],$_POST["Speed"],
				$_POST["Description"],$_POST["NamePokemonTarget"]
				
		) 
	
	){
		
		$nameTarget		= $_POST["NamePokemonTarget"];
		$id				= $_POST["Id"];
		$name			= $_POST["NamePokemon"];
		$gender 		= $_POST["Gender"];
		$type			= $_POST["Type1"];
		$typeTarget		= $_POST["Type1Target"];
		
		$type2Target	= $_POST["Type2Target"];
		$height 		= $_POST["Height"];
		$weight 		= $_POST["Weight"];
		$healthpoints 	= $_POST["HealthPoints"];
		$attack 		= $_POST["Attack"];
		$defense 		= $_POST["Defense"];
		$specialattack 	= $_POST["SpecialAttack"];
		$specialdefense = $_POST["SpecialDefense"];
		$speed 			= $_POST["Speed"];
		$description 	= $_POST["Description"];
		if(empty($_POST["Type2"])==FALSE){
			$type2			= $_POST["Type2"];
		}else{
			$type2			= NULL;
		}
	$pokemon = new Pokemon($nameTarget, $id, $name,$gender,$type,$type2,$typeTarget,$type2Target,$height,$weight,$healthpoints,$attack,$defense,$specialattack,$specialdefense,$speed,$description,/*$novo_nome*/);		
		if($_FILES['Avatar']['name'] != NULL){
			$countfiles = count($_FILES['Avatar']['name']);
			$arquivos = $_FILES["Avatar"];

		//Create obj of connection
				$connection = new Connection('History','root','');
				// call connection method
				$connection->connMethodAss();
				//create statement with incognito to connect
				$stmt = $connection->conn->prepare("DELETE FROM association.pokemonimages WHERE IdPokemon = (SELECT IdPokemon FROM history.pokemon WHERE Name = ?); ");
				//execute the statement using the $id as parameter (substiting the incognito "?" )
				$stmt->execute(array($nameTarget));
				$stmt2 = $connection->conn->prepare("INSERT INTO association.pokemonimages VALUES ((SELECT IdPokemon FROM history.pokemon WHERE Name = ?),?) ");

			for($i=0;$i<$countfiles;$i++){
				
				//echo($arquivos['name'][$i]);
				//pega a extensão do arquivo
				$extensao = strrchr($arquivos['name'][$i], '.');

				// renomeia o arquivo com base na hora que foi inserido para nao haver nomes duplicados
				$str=rand();
				$result = md5($str);
				$novo_nome = $result . $extensao; 
				

				//define o diretorio temporario que o php usa como antessala para enviar o arquivo 
				$diretorio = "upload/"; 

				//efetua
				move_uploaded_file($arquivos['tmp_name'][$i],$diretorio.$novo_nome);

				
				$stmt2->execute(array($nameTarget,$novo_nome));
				
				
				//echo($novo_nome);

			}
		}else{
			
		}


		function insertData(Pokemon $pokemon){
			if($pokemon->get_Type2() != NULL && $pokemon->get_Type2Target() == NULL){
				$stmttype2Update = ("INSERT INTO association.pokemontype VALUES ((SELECT IdPokemon FROM history.pokemon WHERE Name = :nametarget), :type2) ;");
				echo("aqui");
			}else{
				if($pokemon->get_Type2()==NULL && $pokemon->get_Type2Target() == NULL)
				{
					$stmttype2Update =("");
					echo("aqui2");
				}else{
					if($pokemon ->get_Type2Target() != NULL && $pokemon->get_Type2()==NULL){
						$stmttype2Update =("DELETE FROM association.pokemontype WHERE IdPokemon = (SELECT IdPokemon FROM history.pokemon WHERE Name = :nametarget) AND IdType = :type2Target;");
						echo("aqui3");
					}else{
						if($pokemon ->get_Type2Target() != NULL && $pokemon->get_Type2()!=NULL){
							$stmttype2Update = ("UPDATE association.pokemontype SET IdPokemon = :id, IdType = :type WHERE IdPokemon = (SELECT IdPokemon FROM history.pokemon WHERE Name = :nametarget) AND IdType = :type2Target;");
							echo("aqui4");
						}else{
							echo("aqui5");
						}
					}
				}
				
			}
			
			$db = 'history';
			//$stmt = ("INSERT INTO history.pokemon VALUES(:id,:name, :gender, :clas, :type, :height, :weight,:healthpoints,:attack,:defense,:speed,:specialattack,:specialdefense, :avatar)");
			$stmt = ("UPDATE history.pokemon SET IdPokemon = :id, Name = :name, Gender = :gender, Height = :height, Weight = :weight, HealthPoints = :healthpoints, Attack = :attack, Defense = :defense, SpecialAttack = :specialattack, SpecialDefense = :specialdefense, Speed = :speed, Description = :description WHERE name = :nametarget; UPDATE association.pokemontype SET IdPokemon = :id, IdType = :type WHERE IdPokemon = (SELECT IdPokemon FROM history.pokemon WHERE Name = :nametarget) AND IdType = :typeTarget; ".$stmttype2Update);
			$param = array(
				":id" 				=> $pokemon->get_Id()				,
				":name" 			=> $pokemon->get_Name()				,
				":type" 			=> $pokemon->get_Type()				,
				":type2" 			=> $pokemon->get_Type2()			,
				":typeTarget" 		=> $pokemon->get_TypeTarget()		,
				":type2Target" 		=> $pokemon->get_Type2Target()		,
				":gender" 			=> $pokemon->get_Gender()			,
				":height" 			=> $pokemon->get_Height()			,
				":weight" 			=> $pokemon->get_Weight()			,
				":healthpoints"		=> $pokemon->get_HealthPoints()		,
				":attack"			=> $pokemon->get_Attack()			,
				":defense"			=> $pokemon->get_Defence()			,	
				":specialattack"	=> $pokemon->get_SpecialAttack()	,
				":specialdefense"	=> $pokemon->get_SpecialDefence()	,
				":speed"			=> $pokemon->get_Speed()			,
				":description"		=> $pokemon->get_Description()		,
				//":avatar" 	    	=> $pokemon->get_Image()	   		,
				":nametarget" 	   	=> $pokemon->get_NameTarget()	  	,
			);
			

			$insertConnection =  new insertConnection($stmt, $param, $db);
			$insertConnection->insertDML();
			unset($insertConnection);
			
		}

		insertData($pokemon);
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*
		function insertAssociationType(Pokemon $pokemon){
			$db = 'Association';
			$stmt = ("INSERT INTO association.PokemonType VALUES(:id,:type");
			$param = array(
				":id" 	=> $pokemon->get_Id(),
				":type" => $pokemon->get_Type()				
			);
			
			
			$insertConnection =  new insertConnection($stmt, $param, $db);
			$insertConnection->insertAssociation();
			unset($insertConnection);

		}

		insertAssociationType($pokemon);
	*/
	}


/*
	if(
		isset( 
				$_POST["Id"],$_POST["Name"],$_POST["Gender"],

				$_POST["Type1"],
				$_POST["Type2"],
				$_POST["Height"],$_POST["Weight"],$_POST["HealthPoints"],$_POST["Attack"],
				$_POST["Defense"],$_POST["SpecialAttack"],$_POST["SpecialDefense"],$_POST["Speed"],
				$_FILES["Avatar"]
				
		) 
	){ echo"catatau"; }
*/
?>