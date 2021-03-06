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
	titre			varchar(100) not null,
	recette			text not null,
	etat			enum('private', 'waiting', 'public') not null default 'private',
	temps_prepar	time default null,
	nb_pers			int default 1,
	difficulte		enum('facile', 'moyen', 'difficile', 'Tdifficile') default 'facile',
	image_recette	text default null,
	date_recette	DATE not null
) ENGINE=INNODB;


CREATE TABLE Appartient
(
	id_recette		int,
	id_categorie	int,
	constraint PK_Appartient primary key (id_recette, id_categorie)
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
	id_unite		int,
	quantite		float not null,
	constraint PK_Compose primary key (id_recette, id_ingredient, id_unite)
) ENGINE=INNODB;


CREATE TABLE Ingredient
(
	id_ingredient	int auto_increment,
	nom_ingredient	varchar(25),
	constraint PK_Ingredient primary key (id_ingredient, nom_ingredient)
) ENGINE=INNODB;


CREATE TABLE Unite
(
	id_unite	int auto_increment,
	nom_unite	varchar(25),
	constraint PK_Unite primary key (id_unite, nom_unite)
) ENGINE=INNODB;


ALTER TABLE Commentaire
ADD constraint FK_Commentaire_Recette foreign key (id_recette) references Recette (id_recette);

ALTER TABLE Recette
ADD constraint FK_Recette_Utilisateur foreign key (id_utilisateur) references Utilisateur (id_utilisateur);

ALTER TABLE Appartient
ADD constraint FK_Appartient_Recette foreign key (id_recette) references Recette (id_recette),
ADD constraint FK_Appartient_Categorie foreign key (id_categorie) references Categorie (id_categorie);

ALTER TABLE Compose
ADD constraint FK_Compose_Recette foreign key (id_recette) references Recette (id_recette),
ADD constraint FK_Compose_Ingredient foreign key (id_ingredient) references Ingredient (id_ingredient),
ADD constraint FK_Compose_Unite foreign key (id_unite) references Unite (id_unite);

