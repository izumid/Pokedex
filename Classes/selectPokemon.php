<?php 
    include 'conn.php';

    if(isset($_POST["searchBar"])){
        	
        include 'invalid.php';
        //Create obj of connection
        //$connection = new Connection('History','root','');
        // call connection method
        $connection->connMethod();

        //set $id to result of post
        $id = $_POST["searchBar"];

        //create statement with incognito to connect
		
        $stmt = $connection->conn->prepare("SELECT 
        poke.IdPokemon,
        poke.Name,
        poke.Gender,
        poke.Height,
        poke.Weight,
        poke.HealthPoints,
        poke.Attack,
        poke.Defense,
        poke.SpecialAttack,
        poke.SpecialDefense,
        poke.Speed,
        poke.Description,
        evo.Name AS Nameevolution,
        evo.Description AS Descriptionevolution,
        abi.Name AS NameAbility,
        abi.Description AS DescriptionAbility
        FROM history.pokemon AS poke
        INNER JOIN
        association.pokemonEvolution AS pokeevo ON poke.IdPokemon = pokeevo.IdPokemon
        INNER JOIN
        history.evolution AS evo ON pokeevo.Idevolution = evo.Idevolution
        INNER JOIN
        association.pokemonability AS pokeabi ON poke.IdPokemon = pokeabi.IdPokemon
        INNER JOIN
        history.ability AS abi ON pokeabi.IdAbility = abi.IdAbility
        WHERE poke.IdPokemon =(SELECT IdPokemon FROM history.pokemon WHERE Name = ?);");
		

		//$stmt = $connection->conn->prepare("SELECT * FROM history.pokemon AS A WHERE IdPokemon = 1");

        //execute the statement using the $id as parameter (substiting the incognito "?" )
        $stmt->execute([$id]);
        //associate all results to key-value mechanic
        $count = $stmt->rowCount();
        $resultSet = $stmt->fetch();
        
        if($count > 0){	
        //set variables to result of key value above, being able to use whenever we want
            $IdPokemon = $resultSet["IdPokemon"];
            $nome = $resultSet["Name"];
            //$IdType = $resultSet["IdType"];
            $Gender = $resultSet["Gender"];
            $Height = $resultSet["Height"];
            $Weight = $resultSet["Weight"];
            $Description = $resultSet["Description"];
            $HealthPoints = $resultSet["HealthPoints"];
            $Attack = $resultSet["Attack"];
            $Defense = $resultSet["Defense"];
            $SpecialAttack = $resultSet["SpecialAttack"];
            $SpecialDefense = $resultSet["SpecialDefense"];
            $Speed = $resultSet["Speed"];

            /////////////////VARIAVEIS ABAIXO ESTAO SEM LOCAL DE VISUALIZAÇÃO NO INDEX SCREEN A. 
            $Nameevolution = $resultSet["Nameevolution"]; //METODO DE EVOLUÇÃO
            $Descriptionevolution = $resultSet["Descriptionevolution"]; //DESCRIÇÃO METODO DE EVOLUÇÃO
            $NameAbility = $resultSet["NameAbility"];
            $DescriptionAbility = $resultSet["DescriptionAbility"];
            //$imagem = $resultSet["Avatar"];
            /*
            //Do the same as above, but result set is the "type"
            $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
            $stmt->execute([$IdType]);
            $resultSetType = $stmt->fetch();
            $typeName = $resultSetType["Name"];
            */



            $stmt = $connection->conn->prepare("SELECT IdType FROM association.pokemontype WHERE IdPokemon = ?");
            //execute the statement using the $id as parameter (substiting the incognito "?" )
            $stmt->execute([$IdPokemon]);
            //associate all results to key-value mechanic
            $count = $stmt->rowCount();
            $resultSet = $stmt->fetchAll();
            //var_dump($resultSet);
            
            if($count == 1){	
            //set variables to result of key value above, being able to use whenever we want
            
                $IdType = $resultSet[0][0];
                $IdType2 = NULL;
                $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
                $stmt->execute([$IdType]);
                $resultSetType = $stmt->fetch();
                $typeName = $resultSetType["Name"];
                $typeName2 = NULL;

            }else{
                if($count == 2){	
                    //set variables to result of key value above, being able to use whenever we want
                
                    $IdType = $resultSet[0][0];
                    $IdType2 = $resultSet[1][0];
                    $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
                    $stmt->execute([$IdType]);
                    $resultSetType = $stmt->fetch();
                    $typeName = $resultSetType["Name"];
                    $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
                    $stmt->execute([$IdType2]);
                    $resultSetType = $stmt->fetch();
                    $typeName2 = $resultSetType["Name"];
                    
                
                }else{
                    //errorPokemon();
                }


                $stmt = $connection->conn->prepare("SELECT ImagePath FROM association.pokemonimages WHERE IdPokemon = ?");
                //execute the statement using the $id as parameter (substiting the incognito "?" )
                $stmt->execute([$IdPokemon]);
                //associate all results to key-value mechanic
                $countimages = $stmt->rowCount();
                $resultSet = $stmt->fetchAll();
                //var_dump($resultSet);
                if($countimages>0){
                    $imagem =  $resultSet;
                    
                }
                
                $stmt = $connection->conn->prepare("SELECT IdAttack FROM association.pokemonattack WHERE IdPokemon = ?");
                //execute the statement using the $id as parameter (substiting the incognito "?" )
                $stmt->execute([$IdPokemon]);
                //associate all results to key-value mechanic
                $countpokemonattack = $stmt->rowCount();
                $resultSet = $stmt->fetchAll();
                //var_dump($resultSet);
                    $stmt = $connection->conn->prepare("SELECT 
                    att.IdAttack,
                    att.Name,	
                    type.Name AS NameType,	
                    att.Category,	
                    att.PowerPoints	,
                    att.Power,	
                    att.Accuracy,	
                    att.Description
                    FROM history.attack AS att
                    INNER JOIN 
                    history.type AS type ON att.IdType = type.IdType
                    WHERE IdAttack = ?");

            if($countpokemonattack > 0){	
                for($i=0;$i<$countpokemonattack;$i++){
                    //echo($countpokemonattack);
                    
                    
                    $stmt->execute([$resultSet[$i]["IdAttack"]]);
                    //var_dump([$resultSet[$i]["IdAttack"]]);
                    //associate all results to key-value mechanic
                    //$countpokemonattack = $stmt->rowCount()Pokemon;
                    $resultSetAttack[] = $stmt->fetch();

                    //ESTRUTURA DO ARRAY ACIMA: $resultSetAttack[$i]["IdAttack"]["Name"]["NameType"]["Category"]["PowerPoints"]["Power"]["Accuracy"]["Description"]
                    //echo($resultSetAttack[$i]["Name"]);
                    
                    
                }
            
            }else{
            
            }

            $stmt = $connection->conn->prepare("SELECT * FROM association.pokemonevolutiontrail WHERE IdPokemon = ?");
            //execute the statement using the $id as parameter (substiting the incognito "?" )
            $stmt->execute([$IdPokemon]);
            //associate all results to key-value mechanic
            $count = $stmt->rowCount();
            $resultSet = $stmt->fetch();
            //var_dump($resultSet);
            $IdEvo1 = NULL;
            $IdEvo2 = NULL;
            $IdEvo3 = NULL;

            if($count>0){
                if($resultSet["PositionEvo1"]==1){
                    $IdEvo1 = $resultSet["IdPokemonEvolution1"];
                }else{
                    if($resultSet["PositionEvo1"]==2){
                        $IdEvo2 = $resultSet["IdPokemonEvolution1"];
                    }else{
                        if($resultSet["PositionEvo1"]==3){
                            $IdEvo3 = $resultSet["IdPokemonEvolution1"];
                        }else{

                        }
                    }
                }
                if($resultSet["PositionEvo2"]==1){
                    $IdEvo1 = $resultSet["IdPokemonEvolution2"];
                }else{
                    if($resultSet["PositionEvo2"]==2){
                        $IdEvo2 = $resultSet["IdPokemonEvolution2"];
                    }else{
                        if($resultSet["PositionEvo2"]==3) {
                            $IdEvo3 = $resultSet["IdPokemonEvolution2"];
                        }else{
                            
                        }
                    }
                }
                if($IdEvo1==NULL){
                    $IdEvo1 = $IdPokemon;
                }else{
                    if($IdEvo2==NULL){
                        $IdEvo2 = $IdPokemon;
                    }else{
                        if($IdEvo2==NULL){
                            $IdEvo3 = $IdPokemon;
                        }else{
                            
                        }
                    }
                }
                $stmt = $connection->conn->prepare("SELECT poke.Name, pokeima.ImagePath FROM history.pokemon AS poke
                INNER JOIN 
                association.pokemonimages AS pokeima ON poke.IdPokemon = pokeima.IdPokemon
                WHERE poke.IdPokemon = ? /*AND pokeima.ImagePath LIKE '%front%' */
                LIMIT 1;");
                //execute the statement using the $id as parameter (substiting the incognito "?" )
                $stmt->execute([$IdEvo1]);
                //associate all results to key-value mechanic
                $count = $stmt->rowCount();
                $resultSet = $stmt->fetch();
                if($count>0){
                    $PokemonEvo1Image = $resultSet["ImagePath"];
                    $PokemonEvo1Name = $resultSet["Name"];
                }

                $stmt = $connection->conn->prepare("SELECT poke.Name, pokeima.ImagePath FROM history.pokemon AS poke
                INNER JOIN 
                association.pokemonimages pokeima ON poke.IdPokemon = pokeima.IdPokemon
                WHERE poke.IdPokemon = ?
                LIMIT 1;");
                //execute the statement using the $id as parameter (substiting the incognito "?" )
                $stmt->execute([$IdEvo2]);
                //associate all results to key-value mechanic
                $count = $stmt->rowCount();
                $resultSet = $stmt->fetch();
                if($count>0){
                    $PokemonEvo2Image = $resultSet["ImagePath"];
                    $PokemonEvo2Name = $resultSet["Name"];
                }

                $stmt = $connection->conn->prepare("SELECT poke.Name, pokeima.ImagePath FROM history.pokemon AS poke
                INNER JOIN 
                association.pokemonimages pokeima ON poke.IdPokemon = pokeima.IdPokemon
                WHERE poke.IdPokemon = ?
                LIMIT 1;");
                //execute the statement using the $id as parameter (substiting the incognito "?" )
                $stmt->execute([$IdEvo3]);
                //associate all results to key-value mechanic
                $count = $stmt->rowCount();
                $resultSet = $stmt->fetch();
                if($count>0){
                    $PokemonEvo3Image = $resultSet["ImagePath"];
                    $PokemonEvo3Name = $resultSet["Name"];
                }

            }
                
             //echo("RODOU TUDO!!!!!!!!!!");
            }
            }else{
                errorPokemon();
            }
            

    }
    //if(!isset($_POST["searchBar"])){
        //include 'conn.php';	
        //Create obj of connection
        //$connection = new Connection('History','root','');
        // call connection method
        $connection->connMethod();


        //create statement with incognito to connect
        $stmt = $connection->conn->prepare("SELECT 
        poke.IdPokemon,
        poke.Name
        FROM history.pokemon AS poke
        LIMIT 5");
        //execute the statement using the $id as parameter (substiting the incognito "?" )
        $stmt->execute();
        //associate all results to key-value mechanic
        $countScreenC = $stmt->rowCount();
        $resultSetScreenC = $stmt->fetchAll();
        
        //var_dump($resultSetScreenC);

        for($i=0;$i<$countScreenC;$i++){

            $stmt = $connection->conn->prepare("SELECT ImagePath FROM association.pokemonimages 
            WHERE IdPokemon = ?
            LIMIT 1;");
            //execute the statement using the $id as parameter (substiting the incognito "?" )
            $stmt->execute([$resultSetScreenC[$i]['IdPokemon']]);
            //associate all results to key-value mechanic
            $count = $stmt->rowCount();
            $resultSet = $stmt->fetch();
            if($count>0){
                $PokemonImageC[] = $resultSet["ImagePath"];
               // var_dump($PokemonImageC);
                
            } 
        }
        for($i=0;$i<$countScreenC;$i++){
            $stmt = $connection->conn->prepare("SELECT IdType FROM association.pokemontype WHERE IdPokemon = ?");
            //execute the statement using the $id as parameter (substiting the incognito "?" )
            $stmt->execute([$resultSetScreenC[$i]['IdPokemon']]);
            //associate all results to key-value mechanic
            $count = $stmt->rowCount();
            $resultSet = $stmt->fetchAll();
            //var_dump($resultSet);
            
            if($count == 1){	
            //set variables to result of key value above, being able to use whenever we want
            
                $IdType = $resultSet[0][0];
                $IdType2 = NULL;
                $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
                $stmt->execute([$IdType]);
                $resultSetType = $stmt->fetch();
                $typeNameC[] = $resultSetType["Name"];
                $typeName2C[] = NULL;

            }else{
                if($count == 2){	
                    //set variables to result of key value above, being able to use whenever we want
                
                    $IdType = $resultSet[0][0];
                    $IdType2 = $resultSet[1][0];
                    $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
                    $stmt->execute([$IdType]);
                    $resultSetType = $stmt->fetch();
                    $typeNameC[] = $resultSetType["Name"];
                    $stmt = $connection->conn->prepare("SELECT * FROM history.type WHERE Idtype = ?");
                    $stmt->execute([$IdType2]);
                    $resultSetType = $stmt->fetch();
                    $typeName2C[] = $resultSetType["Name"];
                    
                
                }else{
                    //errorPokemon();
                }
            }
            
       
       // }
        //var_dump($typeNameC);
        //var_dump($typeName2C);
    }
    ?>