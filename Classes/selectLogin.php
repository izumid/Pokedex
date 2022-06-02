<?php
 		
	if(isset($_POST["userLogin"],$_POST["passwordLogin"])){
		//include_once('insertDML.php');
		$userLogin			= $_POST["userLogin"];
		$passwordLogin 		= $_POST["passwordLogin"]; 

		//Create obj of connection
		$conLogin = new Connection('History','root','');
		// call connection method
		$conLogin->connMethod();

		//create statement with incognito to connect
		$stmt = $conLogin->conn->prepare("SELECT * FROM history.admin WHERE User = ?");
		//execute the statement using the $id as parameter (substiting the incognito "?" )
		$stmt->execute([$userLogin]);
		$count = $stmt->rowCount();
		//associate all results to key-value mechanic
		$resultSet = $stmt->fetch();

		if($count>0){
			$selectUser = $resultSet["User"];
			$selectPassword = $resultSet["Password"];

			if($selectPassword == $passwordLogin){
				if(!isset ($_SESSION)){
					session_start();
				}
				$_SESSION['Logged'] = 1;
			


				//header('location: adminPanel.php');
			}else{
				echo "<script language='javascript'>";
				echo "alert('Credenciais invalidas, por favor tente novamente.');";
				echo "</script>";
				/*header('location: registry.php');*/
			}
		}else{
			echo "<script language='javascript'>";
			echo "alert('Credenciais invalidas, por favor tente novamente.');";
			echo "</script>";
		}
	}
		
?>