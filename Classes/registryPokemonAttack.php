<?php
class PokemonAttack{
    private $_IdPokemon;
    private $_Level;
    private $_IdAttack;
    

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdAttack(){
        return $this -> _IdAttack;
    }
    public function get_Level(){
        return $this -> _Level;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdAttack($_IdAttack){
        $this -> _IdAttack = $_IdAttack;
    }
    public function set_Level($_Level){
        $this -> _Level = $_Level;
    }

    public function __construct($_IdPokemon, $_IdAttack, $_Level){
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdAttack($_IdAttack);
        $this -> set_Level($_Level);
    }
}

?>

<?php
	if(isset($_POST["PokemonAttack"], $_POST["AttackPokemon"], $_POST["Level"])){

		$pokemon			= $_POST["PokemonAttack"];
		$attack 			= $_POST["AttackPokemon"];
		$level 			    = $_POST["Level"];
		

        $PokemonAttack = new PokemonAttack($pokemon,$attack,$level);

        function insertData(PokemonAttack $PokemonAttack){
	    	$db = 'association';
	    	$stmt = ("INSERT INTO association.pokemonattack VALUES(:idpokemon,:idattack,:level)");
	    	$param = array(
	    		":idpokemon" 	=> $PokemonAttack->get_IdPokemon()	,
	    		":idattack" 	=> $PokemonAttack->get_IdAttack()	,
	    		":level"     	=> $PokemonAttack->get_Level()	,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonAttack);
    }
?>