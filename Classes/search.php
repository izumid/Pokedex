<?php

require_once('conn.php');	
require_once('invalid.php');			

#function search(){
	if(isset($_POST["searchBar"])){
		//Create obj of connection
		$connection = new Connection('History','root','');
		// call connection method
		$connection->connMethod();

		//set $id to result of post
		$id = $_POST["searchBar"];

		//create statement with incognito to connect
		$stmt = $connection->conn->prepare("SELECT * FROM history.pokemon WHERE Name = ?");
		//execute the statement using the $id as parameter (substiting the incognito "?" )
		$stmt->execute([$id]);
		//associate all results to key-value mechanic
		$count = $stmt->rowCount();
		$resultSet = $stmt->fetch();
		
		if($count > 0){	
		//set variables to result of key value above, being able to use whenever we want
			$IdPokemon = $resultSet["IdPokemon"];
			$nome = $resultSet["Name"];
			$IdType = $resultSet["IdType"];
			$Gender = $resultSet["Gender"];
			$Height = $resultSet["Height"];
			$Weight = $resultSet["Weight"];
			$Description = $resultSet["Description"];
			$HealthPoints = $resultSet["HealthPoints"];
			$Attack = $resultSet["Attack"];
			$Defense = $resultSet["Defense"];
			$SpecialAttack = $resultSet["SpecialAttack"];
			$SpecialDefense = $resultSet["SpecialDefense"];
			$Speed = $resultSet["Speed"];
			$imagem = $resultSet["Avatar"];
			
			//Do the same as above, but result set is the "type"
			$stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
			$stmt->execute([$IdType]);
			$resultSetType = $stmt->fetch();
			$typeName = $resultSetType["Name"];
		}else{
			errorPokemon();
		}

	}
#}

#search();
?>
