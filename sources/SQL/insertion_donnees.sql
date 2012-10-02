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
	
INSERT INTO Ingredient(id_unite,nom_ingredient)
	VALUES(3,'Farine');

INSERT INTO Ingredient(id_unite,nom_ingredient)
	VALUES(3,'Sucre');

INSERT INTO Ingredient(id_unite,nom_ingredient)
	VALUES(1,'Oeuf');
	
INSERT INTO Categorie(nom_categorie)
	VALUES('Entree');

INSERT INTO Categorie(nom_categorie)
	VALUES('Plat');

INSERT INTO Categorie(nom_categorie)
	VALUES('Dessert');

INSERT INTO Recette(id_utilisateur,id_categorie,titre,recette,etat)
	VALUES(1,2,'Soupe au Pistou','Et bien dans une casserole, tu mets des haricots et de la sauce tomate. Beh ouais!',1);

INSERT INTO Recette(id_utilisateur,id_categorie,titre,recette,etat)
	VALUES(2,3,'Gateau au caca','Si je dis : onctueux, succulent, délicieux et appétissant. Vous répondez ? Gateau au caca, bien sûr!\nEn exclusivité pour le site, je propose de vous délivrer la si recherchée recette de ce fameux met.\nMais avant cela, je tiens à remercier mon ami Adrien, non seulement parce que c\'est un cuisinier de génie mais surtout parce qu\'il m\'autorise à vous communiquer sa recette!',2);

INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(1,1,2);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(1,2,3);

INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(1,5,2);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(2,3,80);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(2,4,200);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(2,5,3);

INSERT INTO Commentaire(id_utilisateur,id_recette,commentaire,date_com)
	VALUES(3,1,'Owi ! Ma copine va adorer ! :)','2012-10-02 18:23:42');
	
INSERT INTO Commentaire(id_utilisateur,id_recette,commentaire,date_com)
	VALUES(1,2,'Mhhhhhh soké','2012-10-02 18:02:00');

INSERT INTO Commentaire(id_utilisateur,id_recette,commentaire,date_com)
	VALUES(2,2,'Tu aimes hein ? :D','2012-10-02 21:17:53');
