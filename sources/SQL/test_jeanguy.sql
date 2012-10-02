INSERT INTO Utilisateur(id_utilisateur,login,nom_utilisateur,prenom,mdp,email,type_utilisateur)
	VALUES(2,'Pistou','Robert','Jean-Guy','supermdp','robert@jambon.net',0);
	
INSERT INTO Unite(id_unite,nom_unite)
	VALUES(3,'Kg');

INSERT INTO Unite(id_unite,nom_unite)
	VALUES(4,'Litre');
	
INSERT INTO Ingredient(id_ingredient,id_unite,nom_ingredient)
	VALUES(2,3,'Haricots');
	
INSERT INTO Ingredient(id_ingredient,id_unite,nom_ingredient)
	VALUES(3,4,'Sauce tomate');
	
INSERT INTO Categorie(id_categorie, nom_categorie)
	VALUES(2,'Entree');

INSERT INTO Recette(id_recette,id_utilisateur,id_categorie,titre,recette,etat)
	VALUES(2,2,2,'Soupe au Pistou','Et bien dans une casserole, tu mets des haricots et de la sauce tomate. Beh ouais!',1);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(2,2,2);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(2,3,3);
	
INSERT INTO Commentaire(id_com,id_utilisateur,id_recette,commentaire,date_com)
	VALUES(1,2,2,'Mhhhhhh soké',20121002 18:02:00);
