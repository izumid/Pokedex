<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon"  href="Image/icons/08.png" type="image/x-icon" />
		<title>Admin Registry</title>

		<link rel="stylesheet" href="style/reset.css">
		<link rel="stylesheet" href="style/registry.css">
		<link rel="stylesheet" href="style/header.css">
		<link rel="stylesheet" href="style/sideMenu.css">

		<?php 		  
			include_once('Classes/insertDml.php');
			include_once('Classes/registryAdmin.php');	
		?>
	</head>

  	<body>
    	<?php include_once('phpIncludes/header.php');?>
		<main>
			<div id="pokeballContainer">
				<span id="redPokeballPart">
					<span id="openPokeballBaseButton">
						<span id="openPokeballButton"></span>
					</span>
				</span>

				<span id="whitePokeballPart"></span>

				<div id="mainContainer">
					<div id="formGeneralContainer">
						<div id="formContainter">
							<form method="post" action="registry.php">
								<label>
									<input name="User" placeholder="User" required>
									<input type="Email" name="Email" placeholder="E-Mail" required>
								</label>

								<label>
									<input type="Password" id="Key" name="Password1" placeholder="Key" required>
									<input type="Password" id="RepeatKey" name="Password" placeholder="Repeat Key" required>
								</label>

								<button disabled id="Registry" class="btnSubmit" type="submit">Registry</button>
							</form>
						</div>
						<div id="grayBarTextBoard">
							<section>
								<span class="rectangles"></span>
								<span class="rectangles"></span>
							</section>

							<section>
								<span class="rectangles"></span>
								<span class="rectangles"><span id="lighter"><span></span>
							</section>
						</div>
					</div>
				</div>
				
			</div>  
		</main>
		
    	<?php include_once('phpIncludes/sideMenu.php');?>
 	</body>

	<script type="text/javascript" src="Js/live.js"></script>	
	<script type="text/javascript" src="Js/jQuery_v3.6.0.js"></script>	 
	<script type="text/javascript" src="Js/showRegistryBox.js"></script>	 
	<script type="text/javascript" src="Js/passwordCheck.js"></script>	 
</html>