

CREATE TABLE Utilisateur
(
	id_utilisateur		int auto-increment primary key,
	login				varchar(25) primary key,
	nom_utilisateur		varchar(25) default null,
	prenom				varchar(25) default null,
	mdp					varchar(100) not null,
	email				varchar(25) not null,
	type_utilisateur	integer not null default 0
	
	constraint CST_Type_Utilisateur
		check (type_utilisateur == 0 OR type_utilisateur == 1)
);


CREATE TABLE Commentaire
(
	id_com			int auto-increment primary key,
	id_utilisateur	int,
	id_recette		int,
	commentaire		text not null,
	date_com		DATETIME not null
);


CREATE TABLE Recette
(
	id_recette		int auto-increment primary key,
	id_categorie	int,
	titre			varchar(100) not null,
	recette			text not null,
	etat			integer not null default 0
	
	constraint CST_Etat_Recette
		check (etat == 0 OR etat == 1 OR etat == 2)
);


CREATE TABLE Categorie
(
	id_categorie	int auto-increment primary key,
	nom_categorie	varchar(10) not null
	
	constraint CST_Nom_Categorie
		check (nom_categorie IN ('Entree', 'Plat', 'Dessert'))
);


CREATE TABLE Compose
(
	id_recette		int,
	id_ingredient	int,
	quantite		decimal(4,3),
	constraint PK_Ingredient primary key (id_recette, id_ingredient)
);


CREATE TABLE Ingredient
(
	id_ingredient	int auto-increment,
	id_unite		int,
	nom_ingredient	varchar(25),
	constraint PK_Ingredient primary key (id_ingredient, nom_ingredient)
);


CREATE TABLE Unite
(
	id_unite	int auto-increment,
	nom_unite	varchar(25),
	constraint PK_Unite primary key (id_unite, nom_unite)
);


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


