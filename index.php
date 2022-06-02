<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon"  href="Image/icons/01.png" type="image/x-icon" />
		
		<link rel="stylesheet" href="Style/reset.css">
		<link rel="stylesheet" href="Style/index.css">
		<link rel="stylesheet" href="Style/login.css">
		<link rel="stylesheet" href="Style/forms.css">

		<link rel="stylesheet" href="Style/indexMenu.css">

		<link rel="stylesheet" href="Style/indexScreenA.css">
		<link rel="stylesheet" href="Style/indexScreenA_Infos.css">
		
		<link rel="stylesheet" href="Style/indexScreenB.css">
		<link rel="stylesheet" href="Style/indexScreenC.css">
			
		<title>POKÉDEX</title> 
		<?php  require_once('Classes/selectPokemon.php');?>

	
	</head>

   <body>
   		<?php  
			require_once('Classes/selectLogin.php');
			include_once('phpIncludes/login.php');  
		?>

		<main id="mainContainer">
			<div id="container">
				<?php include_once('phpIncludes/indexScreenA.php');?>
				
			</div> 
			<div id="center-division"></div>
				
			<aside id="sideScreenContainer">
				<div id= "sideScreen">
					<?php 
						include_once('phpIncludes/indexScreenB.php');
						include_once('phpIncludes/indexScreenC.php');
					?>
				</div>
			</aside>
			</div>			
		</main>

	</body>
	<script type="text/javascript" src="Js/live.js"></script>
	<script type="text/javascript" src="Js/index.js"></script>
	<script type="text/javascript" src="Js/zoomInOut.js"></script>
</html>