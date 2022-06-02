<?php
	class Connection{
		private $bd, $us, $pw;

		public function set_Bd($bd) {$this->bd = $bd;}
		public function set_Us($us) {$this->us = $us;}
		public function set_Pw($pw) {$this->pw = $pw;}
		
		public function get_Bd() {return $this->bd;}
		public function get_Us() {return $this->us;}
		public function get_Pw() {return $this->pw;}
		
		function __construct($bd,$us,$pw){
			$this->set_Bd('mysql:host=127.0.0.1;port=3306;dbname=' . $bd);
			$this->set_Us($us);
			$this->set_Pw($pw);
		}

		function phpAlertConn($messageToPrint) {
			echo '<script type="text/javascript">alert("' . $messageToPrint . '")</script>';
		}

		function connMethod(){	
			try{
				$this->conn = new PDO($this->bd, $this->us, $this->pw);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//return($this->conn);
				return( $conn = $this->conn);
			}
			catch(PDOException $ex){
				$this->phpAlertConn($ex->getMessage());
			}

		}

		public function phpAlertConnAss($messageToPrint) {
			echo '<script type="text/javascript">alert("' . $messageToPrint . '")</script>';
		}
		
		function connMethodAss(){	
			try{
				$this->conn = new PDO($this->bd, $this->us, $this->pw);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//return($this->conn);
				return( $conn = $this->conn);
			}
			catch(PDOException $ex){
				$this->phpAlertConnAss($ex->getMessage());
			}

		}
		
		public function dml($sql){
			$query = $this->connMethod()->prepare($sql);
			$query->execute();
		}

		/*
		function close(){
			try{
				$stmt = $conn->prepare('KILL CONNECTION_ID()');
				$stmt->execute();
			}
			catch(PDOException $ex){
				echo 'Erro: '.$ex->getMessage();
			}
			
		}
		*/
	}
	$connection = new Connection('History','root','');
?>
