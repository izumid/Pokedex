USE Association;
DROP DATABASE Association;
USE Dimension;
DROP DATABASE Dimension;
USE History;
DROP DATABASE History;

CREATE SCHEMA History;
CREATE SCHEMA Association;
CREATE SCHEMA Dimension;

CREATE TABLE IF NOT EXISTS History.Type(
	IdType 								INT 			NOT NULL AUTO_INCREMENT,
	Name 								VARCHAR(255) 	NOT NULL,
				
	CONSTRAINT PK_Type 					PRIMARY KEY 	(IdType)
) ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS History.Evolution(
	IdEvolution 						INT 			NOT NULL AUTO_INCREMENT,
	Name 								VARCHAR(255)	NOT NULL,
	Description 						VARCHAR(255)	NOT NULL,
			
	CONSTRAINT PK_Evolution 			PRIMARY KEY 	(IdEvolution) /* estava assim CONSTRAINT PK_Ability 				PRIMARY KEY 	(IdAbility)*/
) ENGINE=INNODB DEFAULT CHARSET= utf8;


CREATE TABLE IF NOT EXISTS History.Admin(
	IdUser								INT 			NOT NULL AUTO_INCREMENT,
	User 					    		VARCHAR(150)	NOT NULL,
	Email 								VARCHAR(255)    NOT NULL,
	Password 							VARCHAR(150)    NOT NULL,
	Date								DATETIME		NOT NULL,
	validCtrl							BOOLEAN			NOT NULL,
	CONSTRAINT PK_Type 					PRIMARY KEY 	(IdUser),
    CONSTRAINT UN_AdminUser				UNIQUE 			(User)
) ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS History.Pokemon(
	IdPokemon							INT 			NOT NULL,
	Name 								VARCHAR(255)	NOT NULL UNIQUE,
	IdType 								INT 			NOT NULL,
	Gender 								VARCHAR(1)		NOT NULL,
	Height 								FLOAT	 		NOT NULL,
	Weight 								FLOAT		 	NOT NULL,
	HealthPoints						SMALLINT 		NOT NULL,	
	Attack 								SMALLINT 		NOT NULL,	
	Defense 							SMALLINT 		NOT NULL,	
	SpecialAttack						SMALLINT 		NOT NULL,	
	SpecialDefense						SMALLINT 		NOT NULL,	
	Speed 								SMALLINT 		NOT NULL,	
	/*Avatar								BLOB			NOT NULL,	*/
	Description							TEXT			NOT NULL,	
	Avatar								VARCHAR(255)	NOT NULL,	
	
	CONSTRAINT PK_Pokemon 				PRIMARY KEY		(IdPokemon),
	CONSTRAINT FK_TypePokemon			FOREIGN KEY		(IdType)   		REFERENCES History.Type(IdType)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS History.Attack(
	IdAttack 							INT 			NOT NULL AUTO_INCREMENT,
	Name 								VARCHAR(255) 	NOT NULL,
	IdType 								INT 			NOT NULL,	
	Category							VARCHAR(100)	NOT NULL,
	PowerPoints 						TINYINT 		NOT NULL,
	Power								TINYINT			NOT NULL,	
	Accuracy							TINYINT			NOT NULL,	
	Description							TINYTEXT		NOT NULL,	
	CONSTRAINT PK_Attack 				PRIMARY KEY 	(IdAttack),
	CONSTRAINT FK_TypeAttack			FOREIGN KEY		(IdType)   		REFERENCES History.Type(IdType)
	
) ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS History.Ability(
	IdAbility 							INT 			NOT NULL AUTO_INCREMENT,
	Name 								VARCHAR(255)	NOT NULL,
	IdType								INT				NOT NULL,
	Category							VARCHAR(100)	NOT NULL,	 
	Power								SMALLINT		NOT NULL,	 
	Description 						VARCHAR(255) 	NOT NULL ,
			
	CONSTRAINT PK_Ability 				PRIMARY KEY 	(IdAbility),
	CONSTRAINT FK_TypeAbility			FOREIGN KEY		(IdType)   		REFERENCES History.Type(IdType)
) ENGINE=INNODB DEFAULT CHARSET= utf8;



CREATE TABLE IF NOT EXISTS Dimension.TypeRelationship(
	IdTypeRelationship 					INT 			NOT NULL AUTO_INCREMENT,
	IdType 								INT 			NOT NULL, /*estava assim Type 								TINYINT 		NOT NULL,*/
		
	CONSTRAINT PK_IdTypeRelationship	PRIMARY KEY 	(IdTypeRelationship),
	CONSTRAINT FK_IdType				FOREIGN KEY 	(IdType) 		REFERENCES History.Type(IdType)
) ENGINE=INNODB;



CREATE TABLE IF NOT EXISTS Association.PokemonAttack(
	IdPokemon 							INT				NOT NULL AUTO_INCREMENT,
	IdAttack 							INT				NOT NULL,
	PokemonAttackLevel					INT				NOT NULL,
			
	CONSTRAINT FK_PokemonAttack 		FOREIGN KEY 	(IdPokemon) 	REFERENCES History.Pokemon(IdPokemon),
	CONSTRAINT FK_AttackPokemon 		FOREIGN KEY 	(IdAttack) 		REFERENCES History.Attack(IdAttack)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Association.PokemonAbility(
	IdPokemon							INT 			NOT NULL,
	IdAbility							INT 			NOT NULL,
		
	CONSTRAINT FK_PokemonAbility 				FOREIGN KEY 	(IdPokemon)		REFERENCES History.Pokemon(IdPokemon), /*CONSTRAINT IdPokemon 				FOREIGN KEY 	(FK_Pokemon) REFERENCES .Pokemon.PokemonType(IdPokemon)*/
	CONSTRAINT FK_Ability				FOREIGN KEY 	(IdAbility) 	REFERENCES History.Ability(IdAbility), /*REFERENCES .Pokemon.Type(IdAbility),*/
		
	CONSTRAINT PK_PokemonTypeAbility 			PRIMARY KEY 	(IdPokemon, IdAbility) /*CONSTRAINT PK_PokemonType 			PRIMARY KEY 	(FK_Pokemon, FK_Ability)*/
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Association.PokemonType(
	IdPokemon							INT 			NOT NULL,
	IdType								INT 			NOT NULL,
		
	CONSTRAINT FK_PokemonType				FOREIGN KEY 	(IdPokemon)	REFERENCES History.Pokemon(IdPokemon),/*CONSTRAINT FK_Pokemon		FOREIGN KEY 	(IdPokemon)	REFERENCES .History.Pokemon(IdPokemon),*/
	CONSTRAINT FK_Type					FOREIGN KEY 	(IdType)		REFERENCES History.Type(IdType),
		
	CONSTRAINT PK_PokemonType 			PRIMARY KEY 	(IdPokemon, IdType) /*CONSTRAINT PK_PokemonType 			PRIMARY KEY 	(FK_Pokemon, FK_Type)*/
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS Association.PokemonEvolution(
	IdPokemon							INT 			NOT NULL,
	IdEvolution							INT 			NOT NULL,

	CONSTRAINT FK_PokemonEvolution		FOREIGN KEY 	(IdPokemon)		REFERENCES History.Pokemon(IdPokemon),
	CONSTRAINT FK_Evolution				FOREIGN KEY 	(IdEvolution) 	REFERENCES History.Evolution(IdEvolution),
		
	CONSTRAINT PK_PokemonEvolution 		PRIMARY KEY 	(IdPokemon, IdEvolution)
) ENGINE=INNODB;

