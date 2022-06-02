<?php
class PokemonAttack{
    private $_IdPokemonTarget;
    private $_IdPokemon;
    private $_IdAttackTarget;
    private $_IdAttack;
    private $_Level;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdPokemonTarget(){
        return $this -> _IdPokemonTarget;
    }
    public function get_IdAttack(){
        return $this -> _IdAttack;
    }
    public function get_IdAttackTarget(){
        return $this -> _IdAttackTarget;
    }
    public function get_Level(){
        return $this -> _Level;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdPokemonTarget($_IdPokemonTarget){
        $this -> _IdPokemonTarget = $_IdPokemonTarget;
    }
    public function set_IdAttack($_IdAttack){
        $this -> _IdAttack = $_IdAttack;
    }
    public function set_IdAttackTarget($_IdAttackTarget){
        $this -> _IdAttackTarget = $_IdAttackTarget;
    }
    public function set_Level($_Level){
        $this -> _Level = $_Level;
    }

    public function __construct($_IdPokemonTarget,$_IdPokemon, $_IdAttack,$_IdAttackTarget,$_Level){
        $this -> set_IdPokemonTarget($_IdPokemonTarget);
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdAttack($_IdAttack);
        $this -> set_IdAttackTarget($_IdAttackTarget);
        $this -> set_Level($_Level);
    }
}

?>

<?php
	if(isset($_POST["IdPokemonAttackTarget"],$_POST["IdPokemonAttack"], $_POST["IdAttackPokemon"], $_POST["IdAttackPokemonTarget"], $_POST["IdAttackPokemonlevel"])){

		$pokemontarget			= $_POST["IdPokemonAttackTarget"];
		$pokemon		    	= $_POST["IdPokemonAttack"];
		$attack 		    	= $_POST["IdAttackPokemon"];
		$attacktarget 			= $_POST["IdAttackPokemonTarget"];
		$level      			= $_POST["IdAttackPokemonlevel"];
		

        $PokemonAttack = new PokemonAttack($pokemontarget,$pokemon,$attack,$attacktarget,$level);
        //var_dump($PokemonAttack);

        function insertData(PokemonAttack $PokemonAttack){
	    	$db = 'association';
	    	$stmt = ("UPDATE association.pokemonattack SET IdPokemon = :idpokemon, IdAttack = :idattack, PokemonAttackLevel = :level WHERE IdPokemon = :idpokemontarget AND IdAttack = :idattacktarget");
	    	$param = array(
	    		":idpokemontarget"  => $PokemonAttack->get_IdPokemonTarget()	,
	    		":idpokemon" 	    => $PokemonAttack->get_IdPokemon()	        ,
	    		":idattack" 	    => $PokemonAttack->get_IdAttack()	        ,
	    		":level"     	    => $PokemonAttack->get_Level()  	        ,
	    		":idattacktarget" 	=> $PokemonAttack->get_IdAttackTarget()	    ,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonAttack);
    }
?>