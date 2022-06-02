<?php  session_start();



?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon"  href="Image/icons/06.png" type="image/x-icon" />
		<title>Registry Pokémon</title>

		<link rel="stylesheet" href="Style/reset.css">
		<link rel="stylesheet" href="style/sideMenu.css">
		<link rel="stylesheet" href="Style/adminPanel.css">
		<link rel="stylesheet" href="Style/forms.css">
		<link rel="stylesheet" href="Style/headerFooter.css">
		
		<?php 
			require_once('Classes/protect.php');
			require_once('Classes/insertDml.php');
			require_once('Classes/registryAttack.php');	
			require_once('Classes/registryType.php');
			require_once('Classes/registryPokemon.php');
			require_once('Classes/registryEvolution.php');
			require_once('Classes/registryAbility.php');	
		?>
	</head>

	<body>
		<main>
			<div id="menu">
				<div id="menuAttack" onclick="showMenu('HistoryAttack')" ><p>Attack</p></div>
				<div id="menuAbilities" onclick="showMenu('HistoryAbilities')"><p>Abilities</p></div>
				<div id="menuType" onclick="showMenu('HistoryType')"><p>Type</p></div>
				<div id="menuEvolution" onclick="showMenu('HistoryEvolution')"><p>Evolution</p></div>
				<div id="menuPokemon" onclick="showMenu('HistoryPokemon')"><p>Pokemon</p></div>       
			</div>

			<div class="formContainer adminPanelForms" id="HistoryAttack">
				<span class="redBarEffect"></span>
				<span class="closeButton" onclick="hideMenu('HistoryAttack')">x</span>

				<form class="Attack" method="post">
					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Name" type="text" placeholder="Attack Name" required>
						<span class="grayBarEffect"></span>
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Type" type="text" placeholder="Attack Type" required>
						<span class="grayBarEffect"></span>
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<textarea name="Description" placeholder="Description" required></textarea>
						<span class="grayBarEffect"></span>
					</label>

					<div class="radiosContainer">   
						<span>Category</span>
						<label>
							<input name="Category" type="radio" value="Physical" label="Physical" required>
							<p> Physical</p>
						</label>

						<label>
							<input name="Category" type="radio" value="Special" label="Special">
							<p> Special </p>
						</label>

						<label>
							<input name="Category" type="radio" value="Status" label="Status">
							<p> Status</p>
						</label>
					</div>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Power" type="number" placeholder="Power">
						<span class="grayBarEffect"></span> 
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Accuracy" type="number" placeholder="Accuracy">
						<span class="grayBarEffect"></span> 
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="PowerPoints" type="number" placeholder="Power Points (PP)" required>
						<span class="grayBarEffect"></span> 
					</label>

					<button class="btnSubmit" type="submit">Send Attack</button>
				</form>
			</div>

			<div class="formContainer adminPanelForms" id="HistoryAbilities">
				<span class="redBarEffect"></span>
				<span class="closeButton" onclick="hideMenu('HistoryAbilities')">x</span>
				
				<form class="Ability" method="post">
					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Number" type="number" placeholder="Ability ID">
						<span class="grayBarEffect"></span>
					</label>

					<label>
						<image src="Image/resume-9874.png" width='25px' height='25px'/>
						<input name="Name" type="text" placeholder="Ability Name">
						<span class="grayBarEffect">
					</label>

					<label>
						<image src="Image/bulletin-board-9123.png" width='25px' height='25px'/>
						<textarea id="txArea" name="Description" placeholder="Ability description"></textarea>
						<span class="grayBarEffect">
					</label>
					
					<button class="btnSubmit" type="submit">Send Abilities</button>
				</form>
			</div>

			<div class="formContainer adminPanelForms" id="HistoryType">
				<span class="redBarEffect"></span>
				<span class="closeButton" onclick="hideMenu('HistoryType')">x</span>
	
				<form class="Type" method="post">
					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="TypeName" type="text" placeholder="Input the Name" Required>
						<span class="grayBarEffect"></span> 
					</label>

					<button class="btnSubmit" type="submit">Send Type</button>
				</form>
			</div>

			<div class="formContainer adminPanelForms" id="HistoryEvolution">
				<span class="redBarEffect"></span>
				<span class="closeButton" onclick="hideMenu('HistoryEvolution')">x</span>

				<form class="Evolution" method="post">
					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Number" type="number" placeholder="Evolution type" Required>
						<span class="grayBarEffect"></span>
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Name" type="text" placeholder="Method of evolution"Required>
						<span class="grayBarEffect"></span>
					</label>  

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<textarea name="Description" cols="21" rows="5" placeholder="Description"Required></textarea>
						<span class="grayBarEffect"></span> 
					</label>

					<button class="btnSubmit" type="submit">Send Evlotion</button>
				</form>
			</div>

			<div class="formContainer adminPanelForms" id="HistoryPokemon">
				<span class="redBarEffect"></span>
				<span class="closeButton" onclick="hideMenu('HistoryPokemon')">x</span>

				<form class="pokemon" method="post" enctype="multipart/form-data">
					<label  class="superInputLabel">
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Id" type="number" placeholder="Number" required>
						<input name="Name" type="text" placeholder="Name" required>
						<span class="grayBarEffect"></span> 
					</label>  

					<label class="superInputLabel"><image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Type1" type="text" placeholder="Type1" required>
						<input name="Type2" type="text"  placeholder="Type2">
						<span class="grayBarEffect"></span>
					</label>
					
					<div class="radiosContainer">   
						<span>Category</span>  
						<label><input name="Gender" type="radio" value="Both" required><p>Both</p></input></label>
						<label><input name="Gender" type="radio" value="Male"><p>Male </p></input></label>
						<label><input name="Gender" type="radio" value="Female"><p>Female</p></input></label>
						<label><input name="Gender" type="radio" value="Unknown"><p>???</p></input></label>
					</div>

					<label class="superInputLabel">
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Height" type="number"placeholder="Height" step="0.01" required>
						<input name="Weight" type="number" placeholder="Weight" step="0.01" required>
						<span class="grayBarEffect"></span>
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="HealthPoints" type="number" placeholder="HealthPoints" required>
						<span class="grayBarEffect"></span> 
					</label>

					<label  class="superInputLabel"><image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Attack" type="number" placeholder="Attack" required>
						<input name="Defense" type="number" placeholder="Defense" required>
						<span class="grayBarEffect"></span>
					</label>       

					<label class="superInputLabel"><image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="SpecialAttack" type="number" placeholder="Sp.Att" required>
						<input name="SpecialDefense" type="number" placeholder="Sp.Def" required>
						<span class="grayBarEffect"></span> 
					</label>
					
					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Speed" type="number" placeholder="Speed" required>
						<span class="grayBarEffect"></span> 
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<input name="Avatar[]" type="file" placeholder="image" required multiple>
						<span class="grayBarEffect"></span> 
					</label>

					<label>
						<image src="Image/stars-color.png" width='25px' height='25px'/>
						<textarea name="Description" cols="21" rows="5" placeholder="Description"></textarea>
						<span class="grayBarEffect"></span> 
					</label>

					<button class="btnSubmit" type="submit">Send Pokémon</button>
				</form>
			</div>
		</main>

    	<?php include_once('phpIncludes/sideMenu.php');?>
	</body>

	<script src="Js/hideShowMenu.js"></script>
	<script type="text/javascript" src="Js/live.js"></script>
</html>


