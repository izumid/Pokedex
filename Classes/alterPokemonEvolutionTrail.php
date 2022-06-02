<?php
class PokemonEvolutionTrail{
    private $_IdPokemon;
    private $_IdPokemonEvolution1;
    private $_IdPokemonTarget;
    private $_IdPokemonEvolution1Target;
    private $_PositionEvo1;
    private $_IdPokemonEvolution2;
    private $_PositionEvo2;
    
    

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_IdPokemonEvolution1(){
        return $this ->_IdPokemonEvolution1;
    }
    public function get_IdPokemonTarget(){
        return $this -> _IdPokemonTarget;
    }
    public function get_IdPokemonEvolution1Target(){
        return $this ->_IdPokemonEvolution1Target;
    }
    public function get_IdPokemonEvolution2(){
        return $this -> _IdPokemonEvolution2;
    }
    public function get_PositionEvo1(){
        return $this -> _PositionEvo1;
    }
    public function get_PositionEvo2(){
        return $this -> _PositionEvo2;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_IdPokemonEvolution1($_IdPokemonEvolution1){
        $this -> _IdPokemonEvolution1 = $_IdPokemonEvolution1;
    }
    public function set_IdPokemonTarget($_IdPokemonTarget){
        $this -> _IdPokemonTarget = $_IdPokemonTarget;
    }
    public function set_IdPokemonEvolution1Target($_IdPokemonEvolution1Target){
        $this -> _IdPokemonEvolution1Target = $_IdPokemonEvolution1Target;
    }
    public function set_IdPokemonEvolution2($_IdPokemonEvolution2){
        $this -> _IdPokemonEvolution2 = $_IdPokemonEvolution2;
    }
    public function set_PositionEvo1($_PositionEvo1){
        $this -> _PositionEvo1 = $_PositionEvo1;
    }
    public function set_PositionEvo2($_PositionEvo2){
        $this -> _PositionEvo2 = $_PositionEvo2;
    }

    public function __construct($_IdPokemon,$_IdPokemonEvolution1,$_IdPokemonTarget,$_IdPokemonEvolution1Target, $_PositionEvo1,$_IdPokemonEvolution2,$_PositionEvo2){
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_IdPokemonEvolution1($_IdPokemonEvolution1);
        $this -> set_IdPokemonTarget($_IdPokemonTarget);
        $this -> set_IdPokemonEvolution1Target($_IdPokemonEvolution1Target);
        $this -> set_PositionEvo1($_PositionEvo1);
        $this -> set_IdPokemonEvolution2($_IdPokemonEvolution2);
        $this -> set_PositionEvo2($_PositionEvo2);
    }
}

?>

<?php
	if(isset($_POST["IdPokemonEvolutionTrail"],$_POST["IdPokemonEvolution1"],$_POST["IdPokemonEvolutionTrailTarget"],$_POST["IdPokemonEvolution1Target"], $_POST["PositionEvo1"], $_POST["IdPokemonEvolution2"], $_POST["PositionEvo2"])){

		$idpokemonevolutiontrail	    = $_POST["IdPokemonEvolutionTrail"];
		$idpokemonevolution1		    = $_POST["IdPokemonEvolution1"];
        $idpokemonevolutiontrailtarget	= $_POST["IdPokemonEvolutionTrailTarget"];
		$idpokemonevolution1target		= $_POST["IdPokemonEvolution1Target"];
		$positionevo1 		    	    = $_POST["PositionEvo1"];
		$idpokemonevolution2 		    = $_POST["IdPokemonEvolution2"];
		$positionevo2      			    = $_POST["PositionEvo2"];
		

        $PokemonEvolutionTrail = new PokemonEvolutionTrail($idpokemonevolutiontrail,$idpokemonevolution1,$idpokemonevolutiontrailtarget,$idpokemonevolution1target,$positionevo1,$idpokemonevolution2,$positionevo2);
        //var_dump($PokemonEvolutionTrail);

        function insertData(PokemonEvolutionTrail $PokemonEvolutionTrail){
	    	$db = 'association';
	    	$stmt = ("UPDATE association.pokemonevolutiontrail SET IdPokemon =:idpokemonevolutiontrail,IdPokemonEvolution1 =:idpokemonevolution1, PositionEvo1 = :positionevo1, IdPokemonEvolution2 = :idpokemonevolution2,PositionEvo2 =:positionevo2 WHERE IdPokemon = :idpokemonevolutiontrailtarget AND IdPokemonEvolution1 = :idpokemonevolution1target");
	    	$param = array(
	    		":idpokemonevolutiontrail"          => $PokemonEvolutionTrail->get_IdPokemon()	        ,
	    		":idpokemonevolution1" 	            => $PokemonEvolutionTrail->get_IdPokemonEvolution1(),
                ":idpokemonevolutiontrailtarget"    => $PokemonEvolutionTrail->get_IdPokemon()	        ,
	    		":idpokemonevolution1target" 	    => $PokemonEvolutionTrail->get_IdPokemonEvolution1(),
	    		":positionevo1" 	                => $PokemonEvolutionTrail->get_PositionEvo1()	    ,
	    		":idpokemonevolution2"              => $PokemonEvolutionTrail->get_IdPokemonEvolution2(),
	    		":positionevo2" 	                => $PokemonEvolutionTrail->get_PositionEvo2()	    ,
	    	);
        
	    	$insertConnection =  new insertConnection($stmt, $param, $db);
	    	$insertConnection->insertDML();
	    	unset($insertConnection);
	    }

	    insertData($PokemonEvolutionTrail);
    }
?>