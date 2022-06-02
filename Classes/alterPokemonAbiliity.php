<?php
class PokemonAbiliity{
    private $_IdPokemonTarget;
    private $_IdPokemon;
    private $_IdAbiliity;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdPokemonTarget(){
        return $this -> _IdPokemonTarget;
    }
    public function get_IdAbiliity(){
        return $this -> _IdAbiliity;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdPokemonTarget($_IdPokemonTarget){
        $this -> _IdPokemonTarget = $_IdPokemonTarget;
    }
    public function set_IdAbiliity($_IdAbiliity){
        $this -> _IdAbiliity = $_IdAbiliity;
    }

    public function __construct($_IdPokemonTarget,$_IdPokemon, $_IdAbiliity){
        $this -> set_IdPokemonTarget($_IdPokemonTarget);
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdAbiliity($_IdAbiliity);
    }
}
?>

<?php
    if(isset($_POST["IdPokemonAbilityTarget"],$_POST["IdPokemonAbility"], $_POST["IdAbilityPokemon"])){

		$pokemonTarget		= $_POST["IdPokemonAbilityTarget"];
        $pokemon			= $_POST["IdPokemonAbility"];
		$ability 			= $_POST["IdAbilityPokemon"];

        $PokemonAbiliity =  new PokemonAbiliity($pokemonTarget,$pokemon,$ability);
        var_dump($PokemonAbiliity);

        function insertData(PokemonAbiliity $PokemonAbiliity){
	    	$db = 'association';
	    	$stmt = ("UPDATE association.pokemonability SET IdPokemon = :idpokemon, IdAbility = :idabiliity WHERE IdPokemon = :idpokemontarget");
	    	$param = array(
                ":idpokemontarget" => $PokemonAbiliity->get_IdPokemonTarget(),
	    		":idpokemon" 	=> $PokemonAbiliity->get_IdPokemon()	,
	    		":idabiliity" 	=> $PokemonAbiliity->get_IdAbiliity()	,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonAbiliity);
    }
?>