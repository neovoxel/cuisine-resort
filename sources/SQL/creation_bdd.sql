CREATE DATABASE cuisine CHARACTER SET 'utf8';
USE cuisine;


CREATE TABLE Utilisateur
(
	id_utilisateur		int auto_increment,
	login				varchar(25),
	nom_utilisateur		varchar(25) default null,
	prenom				varchar(25) default null,
	mdp					varchar(100) not null,
	email				varchar(25) not null,
	type_utilisateur	integer not null default 0,
	constraint PK_Utilisateur primary key (id_utilisateur, login),
	
	constraint CST_Type_Utilisateur
		check (type_utilisateur = 0 OR type_utilisateur = 1)
) ENGINE=INNODB;


CREATE TABLE Commentaire
(
	id_com			int auto_increment primary key,
	id_utilisateur	int,
	id_recette		int,
	commentaire		text not null,
	date_com		DATETIME not null
) ENGINE=INNODB;


CREATE TABLE Recette
(
	id_recette		int auto_increment primary key,
	id_utilisateur	int,
	id_categorie	int,
	titre			varchar(100) not null,
	recette			text not null,
	etat			integer not null default 0,
	temps_prepar	time default null,
	nb_pers			int default 1,
	difficulte		int default 0,
	image_recette	text default null,
	
	constraint CST_Etat_Recette
		check (etat = 0 OR etat = 1 OR etat = 2),
	
	constraint CST_Difficulte_Recette
		check (difficulte = 0 OR difficulte = 1 OR difficulte = 2 OR difficulte = 3)
) ENGINE=INNODB;


CREATE TABLE Categorie
(
	id_categorie	int auto_increment,
	nom_categorie	varchar(10),
	image_categorie	text not null,
	constraint PK_Categorie primary key (id_categorie, nom_categorie)
) ENGINE=INNODB;


CREATE TABLE Compose
(
	id_recette		int,
	id_ingredient	int,
	quantite		float not null,
	constraint PK_Ingredient primary key (id_recette, id_ingredient)
) ENGINE=INNODB;


CREATE TABLE Ingredient
(
	id_ingredient	int auto_increment,
	nom_ingredient	varchar(25),
	id_unite		int,
	constraint PK_Ingredient primary key (id_ingredient, nom_ingredient)
) ENGINE=INNODB;


CREATE TABLE Unite
(
	id_unite	int auto_increment,
	nom_unite	varchar(25),
	constraint PK_Unite primary key (id_unite, nom_unite)
) ENGINE=INNODB;


ALTER TABLE Commentaire
ADD constraint FK_Commentaire_Utilisateur foreign key (id_utilisateur) references Utilisateur (id_utilisateur),
ADD constraint FK_Commentaire_Recette foreign key (id_recette) references Recette (id_recette);

ALTER TABLE Recette
ADD constraint FK_Recette_Utilisateur foreign key (id_utilisateur) references Utilisateur (id_utilisateur),
ADD constraint FK_Recette_Categorie foreign key (id_categorie) references Categorie (id_categorie);

ALTER TABLE Compose
ADD constraint FK_Compose_Recette foreign key (id_recette) references Recette (id_recette),
ADD constraint FK_Compose_Ingredient foreign key (id_ingredient) references Ingredient (id_ingredient);

ALTER TABLE Ingredient
ADD constraint FK_Ingredient_Unite foreign key (id_unite) references Unite (id_unite);


