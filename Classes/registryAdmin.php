
<?php
class CreateAdmin{
	private $User		;
	private $Email		;
	private $Password	;
	
	public function set_User		($User)		{$this->User 		= $User		;}
	public function set_Email		($Email)	{$this->Email 		= $Email	;}
	public function set_Password	($Password)	{$this->Password	= $Password	;}
	
	
	public function get_User		()	{return $this->User		;}
	public function get_Email		()	{return $this->Email 	;}
	public function get_Password	()	{return $this->Password	;}
	
	
	function __construct($User, $Email, $Password){
		$this-> set_User		($User)		;
		$this-> set_Email		($Email)	;
		$this-> set_Password	($Password)	;
	}
	
}

?>
<?php
	
	date_default_timezone_set('America/Sao_Paulo') ;

	if(isset($_POST["User"], $_POST["Email"],$_POST["Password"])){

		$user		= $_POST["User"];
		$email 		= $_POST["Email"];
		$password 	= $_POST["Password"];
	
		

		$adm = new CreateAdmin($user,$email,$password);
		

		function insertData(CreateAdmin $adm){
			$db = 'history';
			$stmt = ("INSERT INTO history.admin VALUES(NULL, :user,:email, :password,NOW(),1)");
			$param = array(
				":user" 		=> $adm->get_User()		,
				":email" 		=> $adm->get_Email()	,
				":password"		=> $adm->get_Password()	,
				
				
			);
			
			$insertConnection =  new insertConnection($stmt, $param, $db);
			$insertConnection->insertDML();
			unset($insertConnection);

		}
	
		insertData($adm);
	}
	function phpAlertLogin($messageToPrint) {
		echo '<script type="text/javascript">alert("' . $messageToPrint . '")</script>';
	}

		if(isset($_POST["userLogin"],$_POST["passwordLogin"])){

			$userLogin			= $_POST["userLogin"];
			$passwordLogin 		= $_POST["passwordLogin"]; 

			//Create obj of connection
			$connection = new Connection('History','root','');
			// call connection method
			$connection->connMethod();


			//create statement with incognito to connect
			$stmt = $connection->conn->prepare("SELECT * FROM history.admin WHERE User = ?");
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
					$_SESSION['User'] = $selectUser;


					header('location: adminPanel.php');
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