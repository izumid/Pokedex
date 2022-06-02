<article id="mainScreen">
	<div id="content">
		<?php 
			#require_once('Classes/selectPokemon.php');
			#hide errors 
			error_reporting(0);
			ini_set('display_errors', 0);
			
		?>
		
		<div class="showInfos">
			<section id="screenATopMenu">
				<div id="howEvolve">
					<h1>Evolution By:</h1>
					<p><?php echo($Descriptionevolution);?></p>
				</div>

				<div id="evolutions">
					<div>
						<div class="evoImage">
						<?php if( empty($PokemonEvo1Image) == false){echo( "<img src='upload/".$PokemonEvo1Image."'>");}?>
						</div>
					</div>
					
					<div>
						<div class="evoImage">
						<?php if( empty($PokemonEvo1Image) == false){echo( "<img src='upload/".$PokemonEvo2Image."'>");}?>
						</div>
					
					</div>
					
					<div>
						<div class="evoImage">
						<?php if( empty($PokemonEvo1Image) == false){echo( "<img src='upload/".$PokemonEvo3Image."'>");}?>
						</div>
					</div>
				</div>
			</section>
		
			<form  id="search" action="index.php" method="POST">
				<div>	
					<input id="searchPokemon" name="searchBar" type="text" placeholder="Pokemon Name...">
					<button type="submit"></submit>
				</div>
			</form>
			
			<nav id="tabs">
				<a href="#Status">Status</a>
				<a href="#Description">Description</a>
				<a href="#Moves">Moves</a>		
			</nav>

			<article id="carousel">
				<div id="Status">
					<span class="lightRedEffect"></span>
					
					<span class="darkRedEffect"></span>
					<?php require_once('phpIncludes/colorWidth.php');  ?>
					<div class="StatusTable">

						<div class="StatusTableRow">
							<span class="StatusTableData">H.P</span >
							<span class="StatusTableData"><?php	echo($HealthPoints);?></span>
							<span class="StatusTableData">
								<div class="barContainer">
									<span class="bar" <?php changeColor($HealthPoints); ?> ></span>
								</div>
							</span>
						</div>

						<div class="StatusTableRow">
							<span class="StatusTableData">ATK</span>
							<span class="StatusTableData"><?php	echo($Attack);?></span>
							<span class="StatusTableData">
								<div class="barContainer">
									<span class="bar" <?php changeColor($Attack); ?> ></span>
								</div>
							</span>
						</div>

						<div class="StatusTableRow">
							<span class="StatusTableData">DEF</span>
							<span class="StatusTableData"><?php	echo($Defense);?></span>
							<span class="StatusTableData">
								<div class="barContainer">
									<span class="bar" <?php changeColor($Defense); ?> ></span>
								</div>
							</span>
						</div>

						<div class="StatusTableRow">
							<span class="StatusTableData">SP.ATK</span>
							<span class="StatusTableData"><?php	echo($SpecialAttack);?></span>
							<span class="StatusTableData">
								<div class="barContainer">
									<span class="bar"<?php changeColor($SpecialAttack); ?> ></span>
								</div>
							</span>
						</div>

						<div class="StatusTableRow">
							<span class="StatusTableData">SP.DEF</span>
							<span class="StatusTableData"><?php	echo($SpecialDefense);?></span>
							<span class="StatusTableData">
								<div class="barContainer">
									<span class="bar" <?php changeColor($SpecialDefense); ?> ></span>
								</div>
							</span>
						</div>

						<div class="StatusTableRow">
							<span class="StatusTableData">SPD</span>
							<span class="StatusTableData"><?php	echo($Speed);?></span>
							<span class="StatusTableData">
								<div class="barContainer">
									<span class="bar" <?php changeColor($Speed); ?> ></span>
								</div>
							</span>
						</div>
					</div>
											
					<span class="darkGrayEffect"></span>
					<span class="lightGrayEffect"></span>
				</div>
				
				<div id="Description">
					<div id="descriptionText">
						<h1> Description</h1>
						<p>
						<?php	echo($Description);	?>
						</p>
					</div>
					
					<div id="tableInfos">
						<div class="tableCell">
							<span class="tableHeader">Id</span>
							<span class="tableData"><?php	echo($IdPokemon);	?></span>
						</div>
						
						<div class="tableCell">
							<span class="tableHeader">Name</span>
							<span class="tableData"><?php	echo($nome);	?></span>
						</div>
						
						<div class="tableCell">
							<span class="tableHeader">Type</span>
							<span class="tableData">
								<?php 
									echo($typeName);
									if($typeName2 != NULL){
										echo('/'.$typeName2);
									}else{}
								;?>
							</span>
						</div>
						
						<div class="tableCell">
							<span class="tableHeader">Gender</span>
							<span class="tableData"><?php	echo($Gender);	?></span>
						</div>
						
						<div class="tableCell">
							<span class="tableHeader">Height</span>
							<span class="tableData"><?php	echo($Height.'m');	?></span>
						</div>
						
						<div class="tableCell">
							<span class="tableHeader">Weight</span>
							<span class="tableData"><?php	echo($Weight.'Kg');	?></span>
						</div>
					</div>	
				</div>
				 
				<div id="Moves">
					<div class="movesTableHeader">
						<span class="tableHeader">Id</span>
						<span class="tableHeader">Name</span>
						<span class="tableHeader">Type</span>
						<span class="tableHeader">Category</span>
						<span class="tableHeader">Power</span>
						<span class="tableHeader">Accuracy</span>
						<span class="tableHeader">P.P</span>						
					</div>

					<div id="tableMoves">
						<?php
							for($i=0;$i<$countpokemonattack;$i++){
								echo('
									<div class="movesTableCell">
										<span class="tableData">'.$resultSetAttack[$i]['IdAttack'].'</span>
										<span class="tableData">'.$resultSetAttack[$i]['Name'].'</span>
										<span class="tableData">'.$resultSetAttack[$i]['NameType'].'<img src="Image/Normal.png"></span>
										<span class="tableData">'.$resultSetAttack[$i]['Category'].'</span>
										<span class="tableData">'.$resultSetAttack[$i]['PowerPoints'].'</span>
										<span class="tableData">'.$resultSetAttack[$i]['Power'].'</span>
										<span class="tableData">'.$resultSetAttack[$i]['Accuracy'].'</span>
										<span class="tableData attackDescription">"'.$resultSetAttack[$i]['Description'].'"</span>
									</div>
								');
							}
							
						?>
					</div>
				</div>
			</article>
		</div>
		<?php include_once('indexMenu.php');  ?>
	</div>
</article>