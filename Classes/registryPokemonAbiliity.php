<?php
class PokemonAbiliity{
    private $_IdPokemon;
    private $_IdAbiliity;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdAbiliity(){
        return $this -> _IdAbiliity;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdAbiliity($_IdAbiliity){
        $this -> _IdAbiliity = $_IdAbiliity;
    }

    public function __construct($_IdPokemon, $_IdAbiliity){
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdAbiliity($_IdAbiliity);
    }
}
?>

<?php
    if(isset($_POST["PokemonAbility"], $_POST["AbilityPokemon"])){

		$pokemon			= $_POST["PokemonAbility"];
		$ability 			= $_POST["AbilityPokemon"];

        $PokemonAbiliity =  new PokemonAbiliity($pokemon,$ability);

        function insertData(PokemonAbiliity $PokemonAbiliity){
	    	$db = 'association';
	    	$stmt = ("INSERT INTO association.pokemonabiliity VALUES(:idpokemon,:idabiliity)");
	    	$param = array(
	    		":idpokemon" 	=> $PokemonAbiliity->get_IdAbiliity()	,
	    		":idabiliity" 	=> $PokemonAbiliity->get_IdPokemon()	,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonAbiliity);
    }
?>