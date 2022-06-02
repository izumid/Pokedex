<?php
class PokemonType{
    private $_IdPokemon;
    private $_IdType;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdType(){
        return $this -> _IdType;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdType($_IdType){
        $this -> _IdType = $_IdType;
    }

    public function __construct($_IdPokemon, $_IdType){
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdType($_IdType);
    }
}

?>

<?php
	if(isset($_POST["Id"], $_POST["Type1"])){

		$pokemon			= $_POST["Id"];
		$type 			    = $_POST["Type1"];
		


        $PokemonType = new PokemonType($pokemon,$type);

        function insertData(PokemonType $PokemonType){
	    	$db = 'association';
	    	$stmt = ("INSERT INTO association.pokemontype VALUES(:idpokemon,:idtype)");
	    	$param = array(
	    		":idpokemon"    => $PokemonType->get_IdPokemon()    ,
	    		":idtype" 	    => $PokemonType->get_IdType()	    ,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonType);  
    }
?>