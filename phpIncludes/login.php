<?php
    /*Necessary to show login screen*/
	
    if(isset($_SESSION['Logged']) == 1){
        $call = "true";
		//echo($call);
		header('location: adminPanel.php');
    }
    if(empty($_SESSION['Logged'])){
        $call = 'false';
		//echo($call);
    }
    
    /*
    if($_SESSION['Logged'] == 1){
		$call = 'true';
        echo ($call);

    }
    if($_SESSION['Logged'] != 1){
        $call = 'false';
        echo("Sessão: " .$call);
    }
	*/
	
    
    //var_dump($PokemonEvo1Image);
    //var_dump($nome);		
    
?>

<section id="loginOverlay">
    <div class="formContainer" id="login">

        <span class="redBarEffect"></span>

        <span class="closeButton" onclick="hideLogin('loginOverlay','login')">x</span>

        <form  method="post">
			<label>
				<input name="userLogin" placeholder="Type the user"> 
				<span class="grayBarEffect"></span> 
			</label>

            <label>
				<input type="password"  name="passwordLogin" placeholder="Type your key">
				<span class="grayBarEffect"></span> 
			</label>

            <button class="btnSubmit" type="submit">Login</button>

            <a href="registry.php">Registry</a>
        </form>
    </div>
</section>