<?php
class PokemonEvolution{
    private $_IdPokemon;
    private $_IdEvolution;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdEvolution(){
        return $this -> _IdEvolution;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdEvolution($_IdEvolution){
        $this -> _IdEvolution = $_IdEvolution;
    }

    public function __construct($_IdPokemon, $_IdEvolution){
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdEvolution($_IdEvolution);
    }
}

?>

<?php
	if(isset($_POST["PokemonEvolution"], $_POST["EvolutionPokemon"])){

		$pokemon			= $_POST["PokemonEvolution"];
		$evolution 			= $_POST["EvolutionPokemon"];
		


        $PokemonEvolution = new PokemonEvolution($pokemon,$evolution);

        function insertData(PokemonEvolution $PokemonEvolution){
	    	$db = 'association';
	    	$stmt = ("INSERT INTO association.pokemonevolution VALUES(:idpokemon,:idevolution)");
	    	$param = array(
	    		":idpokemon" 	=> $PokemonEvolution->get_IdPokemon()	,
	    		":idaevolution" => $PokemonEvolution->get_IdEvolution()	,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonEvolution);
    }
?>