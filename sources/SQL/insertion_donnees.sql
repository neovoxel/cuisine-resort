INSERT INTO Utilisateur(login,nom_utilisateur,prenom,mdp,email,type_utilisateur)
	VALUES('Pistou','Robert','Jean-Guy','supermdp','robert@jambon.net',0);

INSERT INTO Utilisateur(login,nom_utilisateur,prenom,mdp,email,type_utilisateur)
	VALUES('torresflo','Torres','Flo','motdepasse','torresflo@hotmail.fr',0);

INSERT INTO Utilisateur(login,mdp,email,type_utilisateur)
	VALUES('AlexMexicanos','alexlefou','alexmexicanos@hotmail.fr',0);

INSERT INTO Unite(nom_unite)
	VALUES('Sans unité');

INSERT INTO Unite(nom_unite)
	VALUES('ml');

INSERT INTO Unite(nom_unite)
	VALUES('g');

INSERT INTO Unite(nom_unite)
	VALUES('Kg');

INSERT INTO Unite(nom_unite)
	VALUES('L');
	
INSERT INTO Ingredient(nom_ingredient)
	VALUES('haricots');
	
INSERT INTO Ingredient(nom_ingredient)
	VALUES('sauce tomate');
	
INSERT INTO Ingredient(nom_ingredient)
	VALUES('farine');

INSERT INTO Ingredient(nom_ingredient)
	VALUES('sucre');

INSERT INTO Ingredient(nom_ingredient)
	VALUES('œufs');
	
INSERT INTO Ingredient(nom_ingredient)
	VALUES('biscuits');

INSERT INTO Mesure(id_ingredient, id_unite)
	VALUES(1,3);

INSERT INTO Mesure(id_ingredient, id_unite)
	VALUES(2,4);

INSERT INTO Mesure(id_ingredient, id_unite)
	VALUES(3,3);
	
INSERT INTO Mesure(id_ingredient, id_unite)
	VALUES(4,3);
	
INSERT INTO Mesure(id_ingredient, id_unite)
	VALUES(5,1);
	
INSERT INTO Mesure(id_ingredient, id_unite)
	VALUES(6,1);

INSERT INTO Categorie(nom_categorie,image_categorie)
	VALUES('Entrées','entrees.jpg');

INSERT INTO Categorie(nom_categorie,image_categorie)
	VALUES('Plats','plats.jpg');

INSERT INTO Categorie(nom_categorie,image_categorie)
	VALUES('Desserts','desserts.jpg');

INSERT INTO Recette(id_utilisateur,titre,recette,etat,temps_prepar,nb_pers,difficulte,date_recette)
	VALUES(1,'Soupe au Pistou','Et bien dans une casserole, tu mets des haricots et de la sauce tomate. Beh ouais!',1,'00:30:00',2,1,'2012-10-03');

INSERT INTO Recette(id_utilisateur,titre,recette,etat,temps_prepar,nb_pers,difficulte,image_recette,date_recette)
	VALUES(2,'Gateau au caca','Si je dis : onctueux, succulent, délicieux et appétissant. Vous répondez ? Gateau au caca, bien sûr!\nEn exclusivité pour le site, je propose de vous délivrer la si recherchée recette de ce fameux met.\nMais avant cela, je tiens à remercier mon ami Adrien, non seulement parce que c\'est un cuisinier de génie mais surtout parce qu\'il m\'autorise à vous communiquer sa recette!',2,'01:30:00',2,2,'img.jpg','2012-10-05');

INSERT INTO Recette(id_utilisateur,titre,recette,etat,temps_prepar,nb_pers,difficulte,image_recette,date_recette)
	VALUES(1,'Tiramisu','Séparer les blancs des jaunes. Mélanger les jaunes + sucre + sucre vanillé. Ajouter le mascarpone au fouet.\n\nMonter les blancs en neige et les incorporer délicatement à la spatule au mélange précédent.\n\nPréparer du café noir.\n\nMouiller les biscuits dans le café.\n\nTapisser le fond du moule avec les biscuits. Recouvrir d\'une couche de crème, œuf, sucre, mascarpone. Alterner biscuits et crème.\nTerminer par une couche de crème. Saupoudrer de cacao.\n\nMettre au réfrigérateur 4 heures minimum.',1,'04:30:00',8,0,'image.jpg','2012-09-26');

INSERT INTO Appartient(id_recette,id_categorie)
	VALUES(1,2);
	
INSERT INTO Appartient(id_recette,id_categorie)
	VALUES(2,3);
	
INSERT INTO Appartient(id_recette,id_categorie)
	VALUES(2,2);
	
INSERT INTO Appartient(id_recette,id_categorie)
	VALUES(3,3);
	
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

INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(3,5,3);
	
INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(3,4,100);

INSERT INTO Compose(id_recette,id_ingredient,quantite)
	VALUES(3,6,24);

INSERT INTO Commentaire(id_utilisateur,id_recette,commentaire,date_com)
	VALUES(3,1,'Owi ! Ma copine va adorer ! :)','2012-10-02 18:23:42');
	
INSERT INTO Commentaire(id_utilisateur,id_recette,commentaire,date_com)
	VALUES(1,2,'Mhhhhhh soké','2012-10-02 18:02:00');

INSERT INTO Commentaire(id_utilisateur,id_recette,commentaire,date_com)
	VALUES(2,2,'Tu aimes hein ? :D','2012-10-02 21:17:53');



CREATE USER 'cuisine_user'@'localhost' IDENTIFIED BY 'SJzEeqLb2HHeNYVV';

GRANT SELECT ,
INSERT ,

UPDATE ,
DELETE ,
FILE ON * . * TO 'cuisine_user'@'localhost' IDENTIFIED BY 'SJzEeqLb2HHeNYVV' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON `cuisine` . * TO 'cuisine_user'@'localhost';

