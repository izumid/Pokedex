<?php
class PokemonEvolution{
    private $_IdPokemon;
    private $_IdPokemonTarget;
    private $_IdEvolution;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdPokemonTarget(){
        return $this -> _IdPokemonTarget;
    }
    public function get_IdEvolution(){
        return $this -> _IdEvolution;
    }
    

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdPokemonTarget($_IdPokemonTarget){
        $this -> _IdPokemonTarget = $_IdPokemonTarget;
    }
    
    public function set_IdEvolution($_IdEvolution){
        $this -> _IdEvolution = $_IdEvolution;
    }

    public function __construct($_IdPokemon,$_IdEvolution,$_IdPokemonTarget ){
        $this -> set_IdPokemonTarget($_IdPokemonTarget);
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdEvolution($_IdEvolution);
    }
}

?>

<?php
	if(isset($_POST["IdPokemonEvolution"], $_POST["IdEvolutionPokemon"],$_POST["IdPokemonEvolutionTarget"])){

		$pokemon			= $_POST["IdPokemonEvolution"];
		$evolution 			= $_POST["IdEvolutionPokemon"];
		$pokemonTarget		= $_POST["IdPokemonEvolutionTarget"];

		


        $PokemonEvolution = new PokemonEvolution($pokemon,$evolution,$pokemonTarget);

        function insertData(PokemonEvolution $PokemonEvolution){
	    	$db = 'association';
	    	$stmt = ("UPDATE association.pokemonevolution SET IdPokemon = :idpokemon, IdEvolution = :idevolution WHERE IdPokemon = :idpokemontarget");
	    	$param = array(
	    		":idpokemon" 	=> $PokemonEvolution->get_IdPokemon()	,
	    		":idevolution" => $PokemonEvolution->get_IdEvolution()	,
	    		":idpokemontarget" 	=> $PokemonEvolution->get_IdPokemonTarget()
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonEvolution);
    }
?>