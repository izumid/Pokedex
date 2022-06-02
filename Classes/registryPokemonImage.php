
<h1>Upload de imagens</h1>
<form method="post" enctype="multipart/form-data">
    <input type="text" required name="Pokemon">
    Arquivo: <input type="file" required name="Arquivo">
    <input type="submit" value="Upload">
</form>

<?php
class PokemonImage{
    private $_IdPokemon;
    private $_Image;

    public function get_IdPokemon(){
        return $this -> _IdPokemon;
    }
    public function get_Image(){
        return $this -> _Image;
    }

    public function set_IdPokemon($_IdPokemon){
        $this -> _IdPokemon = $_IdPokemon;
    }
    public function set_Image($_Image){
        $this -> _Image = $_Image;
    }

    public function __construct($_IdPokemon, $_Image){
        $this -> set_IdPokemon($_IdPokemon);
        $this -> set_Image($_Image);
    }
}
?>
<?php
include 'insertDml.php';	
if(isset($_POST ['Pokemon'],$_FILES['Arquivo'])){
    $pokemon = $_POST['Pokemon'];
    $arquivo = $_FILES['Arquivo']; 
    $extensao = strrchr($_FILES['Arquivo']['name'], '.');//pega a extensão do arquivo
    $novo_nome = md5(time()) . $extensao; // renomeia o arquivo com base na hora que foi inserido para nao haver nomes duplicados
    $diretorio = "upload/"; //define o diretorio temporario que o php usa como antessala para enviar o arquivo 
    move_uploaded_file($_FILES['Arquivo']['tmp_name'],$diretorio.$novo_nome);//efetua o upload para a pasta que escolhemos
    $PokemonImage = new PokemonImage($pokemon,$novo_nome);
    //echo var_dump($PokemonImage);
    function insertData(PokemonImage $PokemonImage){
        $db = 'association';
        $stmt = ("INSERT INTO association.pokemonimage VALUES(:idpokemon,:image)");
        $param = array(
        ":idpokemon" 	=> $PokemonImage->get_IdPokemon()	,
        ":image" 	    => $PokemonImage->get_Image()	    ,
        );

        $insertConnection =  new insertConnection($stmt, $param, $db);
        $insertConnection->insertDML();
        unset($insertConnection);
    }

    insertData($PokemonImage);



   } 

?>
