<div id="sideScreenTop">		
	<div id="rectangle">
		<div class="hardware">×</div>

		<div id="grayContainer">
			<div id="whiteContainer">
                <div id="sideScreenUpLights">
                    <span></span>
                    <span></span>
                </div>

				<div id="pokemonImageContainer">
					<?php 
						if(isset($imagem)){
							for($i=0;$i<$countimages;$i++){
								echo(
									"<img id='pokemonImg' width='150px' weight='150px' src='upload/"
										.$imagem[$i]['ImagePath'].
									"'/>"
								); 
							}
						}
					?>
				</div>

				<div id="sideScreenUpMenu">
					<div id="redButton"  onclick="resizeReset();">
                        <div>
                            <span></span>
                            <span></span>
                        </div>
                    </div> 

                    <div class="zoomContainer">
                        <p>Zoom In</p>
					    <div id="zoomInButton" onclick="zoomIn();"></div> 
                    </div>

                    <div class="zoomContainer">
                        <p>Zoom Out</p>
					    <div id="zoomOutButton" onclick="zoomOut();"></div> 
                    </div>

					<div id="speaker">
						<span class="speakerLine"></span> 
						<div class="speakerLine"></div> 
						<div class="speakerLine"></div> 
						<div class="speakerLine"></div> 
					</div>

					<div class="hardware">×</div>
				</div>
			</div>
		</div>
	</div>
</div>