INSERT INTO Utilisateur(login,nom_utilisateur,prenom,mdp,email,type_utilisateur)
	VALUES('Pistou','Robert','Jean-Guy','supermdp','robert@jambon.net',0);

INSERT INTO Utilisateur(login,nom_utilisateur,prenom,mdp,email,type_utilisateur)
	VALUES('torresflo','Torres','Flo','motdepasse','torresflo@hotmail.fr',0);

INSERT INTO Utilisateur(login,mdp,email,type_utilisateur)
	VALUES('AlexMexicanos','alexlefou','alexmexicanos@hotmail.fr',0);

INSERT INTO Unite(nom_unite)
	VALUES('Sans unité');

INSERT INTO Unite(nom_unite)
	VALUES('Millilitre');

INSERT INTO Unite(nom_unite)
	VALUES('Gramme');

INSERT INTO Unite(nom_unite)
	VALUES('Kilogramme');

INSERT INTO Unite(nom_unite)
	VALUES('Litre');
	
INSERT INTO Ingredient(id_unite,nom_ingredient)
	VALUES(3,'Haricots');
	
INSERT INTO Ingredient(id_unite,nom_ingredient)
	VALUES(4,'Sauce tomate');
	
INSERT INTO Categorie(nom_categorie)
	VALUES('Entree');

INSERT INTO Categorie(nom_categorie)
	VALUES('Plat');

INSERT INTO Categorie(nom_categorie)
	VALUES('Dessert');

INSERT INTO Recette(id_utilisateur,id_categorie,titre,recette,etat)
	VALUES(2,2,'Soupe au Pistou','Et bien dans une casserole, tu mets des haricots et de la sauce tomate. Beh ouais!',1);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(1,1,2);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(1,2,3);
	
INSERT INTO Commentaire(id_com,id_utilisateur,id_recette,commentaire,date_com)
	VALUES(1,1,1,'Mhhhhhh soké','2012-10-02 18:02:00');
