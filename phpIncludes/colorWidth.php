<?php
	function changeColor($status){
		$result;
		if($status <= 30){
			$result = '
					style = "  
					width:'.$status.'%;
					background: linear-gradient(
						90deg, 
						rgba(255,128,128,1) 0%,
						rgba(242,101,101,1) 15%,
						rgba(247,87,87,1) 53%,
						rgba(190, 63, 63,1) 100%
					);"
			';
		}
		elseif($status > 30 && $status <= 60){
			$result ='
				style = "  
				width:'.$status.'%;
				background: linear-gradient(
					90deg, 
					rgb(255, 196, 128) 0%,
					rgb(242, 176, 101) 15%,
					rgb(247, 159, 87) 53%,
					rgb(194, 123, 64) 100%
				);"
			';
		}
		else{
			$result = '
				style = "  
				width:'.$status.'%;
				background: linear-gradient(
					90deg, 
					rgb(128, 255, 206) 0%,
					rgb(101, 242, 143) 15%,
					rgb(87, 247, 167) 53%,
					rgb(07, 207, 107) 100%
				);"
			';
		}

		echo($result);
	}	
?>