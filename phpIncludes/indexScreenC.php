<article id="sideScreenBotton">
	<div id="sideScreenCMenu">
		<div id="ScreenCArrowContainer">
			<button id="screenCArrowUp"> 
				<div id="arrowUp"></div>
				<div class="arrowBody"></div>
			</button>
			
			<button id="screenCArrowDown">
				<div class="arrowBody"></div>
				<div id="arrowDown"></div>
			</button>
		</div>
				
		<div id="screenCButtons"> 
			<div id="screenCYellow"></div>
			<button id="screenCButtonB"><p>B</p></button>
			<button id="screenCButtonA"><p>A</p></button>
		</div>
		
		<div class="hardware">×</div>
	</div>
	
	<aside id="containerScreenC">
		<div class="hardware">×</div>

		<div id="ScreenC">
			<?php
				for($i=0;$i<$countScreenC;$i++){
					$color;
					switch ($typeNameC[$i]) {
						case 'Psychic':
							$color = 'rgb(248,88,136)';
						break;
						case 'Fighting':
							$color = 'rgb(192,48,40)';
						break;
						case 'Bug':
							$color = 'rgb(168,184,31)';
						break;
						case 'Poison':
							$color = 'rgb(160,64,160)';
						break;
						case 'Grass':
							$color = 'rgb(120,200,80)';
						break;
						case 'Fire':
							$color = 'rgb(156,83,32)';
						break;
						case 'Normal':
							$color = 'rgb(168,168,120)';
						break;		
					}

					echo(
						'<div id="resultPokemon" style="background-color:' .$color. ';">
							<p>'.$resultSetScreenC[$i]['IdPokemon'].'</p>
							<p>'.$resultSetScreenC[$i]['Name'].'</p>
							<span id="searchType1">'.$typeNameC[$i].'</span>
							<span id="searchType2">'.$typeName2C[$i].'</span>
							<div id="searchPokemonImage"><img src="upload/'.$PokemonImageC[$i].'"></div>
						</div>'
					);
				}
			?>	
		</div>
	</aside>
</article>

