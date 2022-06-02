<?php
if(!isset($_SESSION)){
    //session_start();
}

if(!isset ($_SESSION['Logged']) ){
    die("Area restrita, por favor realize o registre-se 
    ou realize o login.<p><a href=\"index.php\">Entrar</a>");
}

?>