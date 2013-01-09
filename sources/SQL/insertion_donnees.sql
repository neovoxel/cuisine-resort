INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `nom_utilisateur`, `prenom`, `mdp`, `email`, `type_utilisateur`) VALUES
(1, 'Pistou', 'Robert', 'Jean-Guy', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334', 'robert@jambon.net', 0),
(2, 'torresflo', 'Torres', 'Flo', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334', 'torresflo@hotmail.fr', 0),
(3, 'AlexMexicanos', NULL, NULL, '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334', 'alexmexicanos@hotmail.fr', 0),
(4, 'Thedahu', '', '', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334', 'thedahu@dragon.com', 0),
(5, 'Admin', '', '', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334', 'mail@mail.com', 1),
(6, 'Troll', '', '', '967520ae23e8ee14888bae72809031b98398ae4a636773e18fff917d77679334', 'troll@free.fr', 0);

INSERT INTO `unite` (`id_unite`, `nom_unite`) VALUES
(1, 'Sans unité'),
(2, 'ml'),
(3, 'g'),
(4, 'Kg'),
(5, 'L'),
(6, 'rable'),
(7, 'pots'),
(8, 'boite');
	
INSERT INTO `ingredient` (`id_ingredient`, `nom_ingredient`) VALUES
(1, 'haricots'),
(2, 'sauce tomate'),
(3, 'farine'),
(4, 'sucre'),
(5, 'œufs'),
(6, 'biscuits'),
(7, 'lapin'),
(8, 'tapenade'),
(9, 'courgettes'),
(10, 'aubergines'),
(11, 'carottes'),
(12, 'pois chiche'),
(13, 'semoule'),
(14, 'tomate'),
(15, 'thon');

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `image_categorie`) VALUES
(1, 'Entrées', 'entrees.jpg'),
(2, 'Plats', 'plats.jpg'),
(3, 'Desserts', 'desserts.jpg');


INSERT INTO `recette` (`id_recette`, `id_utilisateur`, `titre`, `recette`, `etat`, `temps_prepar`, `nb_pers`, `difficulte`, `image_recette`, `date_recette`) VALUES
(1, 1, 'Soupe au Pistou', 'Et bien dans une casserole, tu mets des haricots et de la sauce tomate. Beh ouais!', 'public', '00:30:00', 2, 'facile', NULL, '2012-10-03'),
(2, 2, 'Gateau au caca', 'Si je dis : onctueux, succulent, délicieux et appétissant. Vous répondez ? Gateau au caca, bien sûr!\nEn exclusivité pour le site, je propose de vous délivrer la si recherchée recette de ce fameux met.\nMais avant cela, je tiens à remercier mon ami Adrien, non seulement parce que c''est un cuisinier de génie mais surtout parce qu''il m''autorise à vous communiquer sa recette!', 'waiting', '01:30:00', 2, 'moyen', 'img.jpg', '2012-10-05'),
(3, 1, 'Tiramisu', 'Séparer les blancs des jaunes. Mélanger les jaunes + sucre + sucre vanillé. Ajouter le mascarpone au fouet.\n\nMonter les blancs en neige et les incorporer délicatement à la spatule au mélange précédent.\n\nPréparer du café noir.\n\nMouiller les biscuits dans le café.\n\nTapisser le fond du moule avec les biscuits. Recouvrir d''une couche de crème, œuf, sucre, mascarpone. Alterner biscuits et crème.\nTerminer par une couche de crème. Saupoudrer de cacao.\n\nMettre au réfrigérateur 4 heures minimum.', 'public', '04:30:00', 8, 'difficile', 'image.jpg', '2012-09-26'),
(4, 4, 'Lapin à la tapenade', 'Préchauffez votre four à thermostat 7 (210°C). \r\nPrendre un plat à four, huilez-le légèrement à l''huile d''olive. \r\nDéposez-y votre râble de lapin, tartinez chaque morceau avec une bonne cuillerée à café de tapenade et arrosez d''un filet d''huile d''olive. \r\nLavez vos gousses d''ail mais ne les épluchez pas, posez les à côté du râble. Évitez de saler, la tapenade l''est déjà mais poivrez. Mettre au four une bonne demi heure. \r\nSi vous n''aimez pas les plats en sauce, arrêtez vous la ! \r\n\r\nSinon, ôtez vos morceaux de lapin, écrasez les gousses d''ail et ôtez la peau. Déglacez votre plat à l''eau (2 cuillerées à soupe environ) et rajoutez une cuillerée à soupe de tapenade. Laissez chauffer. Et voilà !!', 'public', '00:10:00', 2, 'facile', NULL, '2013-01-09'),
(5, 4, 'Couscous royal', 'Désosser le gigot d''agneau, le découper en cubes de 4 cm. Les mettre à mariner dans de l''huile d''olive et des herbes de Provence pendant 1 heure.\r\nBadigeonner le poulet d''huile d''olive et le recouvrir de fleur de sel, le faire cuire à la tourne broche dans le four pendant 1h à 1h30.\r\nÉplucher tous les légumes et les oignons, les détailler en gros cubes.\r\nFaire revenir les morceaux de collier dans le couscoussier à l''huile d''olive, les retirer et y mettre tous les légumes à revenir sauf les courgettes.\r\nCouvrir d''eau, saler, y ajouter le concentré de tomate, les tomates pelées, le safran, le paprika, le Ras el hanout et les morceaux de collier.\r\nLaisser mijoter le tout durant 1h à 1h30, ajouter les courgettes au bout de 30 minutes de cuisson et les pois chiches 20 minutes avant la fin de la cuisson.\r\nPréparer la semoule en la faisant cuire à la vapeur dans le haut du couscoussier et en la roulant plusieurs fois, y ajouter du beurre à la fin.\r\nPiquer les morceaux d''agneaux marinés sur des brochettes en alternant avec un ou deux morceaux d''oignons.\r\nLes faire cuire au grill viande ou au barbecue.\r\nFaire cuire les merguez au grill viande ou au barbecue.\r\nDécouper le poulet.\r\nServir le tout accompagné de harissa(selon les goûts).', 'private', '00:45:00', 8, 'difficile', NULL, '2013-01-09'),
(6, 6, 'Salade Niçoise', 'Simplement couper tous les ingrédients en petits morceaux, couper les artichauts en 2 de façon à ne garder que la partie inférieure et couper le cœur en 4. \r\n\r\nAjouter le thon, le basilic et les févètes, assaisonner avec l''huile d’olive le vinaigre, le sel et le poivre. \r\n\r\nServir dans chaque assiette et ajouter un œuf dur coupé en 4 dans chacune.', 'public', '00:30:00', 4, 'facile', NULL, '2013-01-09');

INSERT INTO `appartient` (`id_recette`, `id_categorie`) VALUES
(6, 1),
(1, 2),
(2, 2),
(4, 2),
(5, 2),
(2, 3),
(3, 3);

INSERT INTO `compose` (`id_recette`, `id_ingredient`, `id_unite`, `quantite`) VALUES
(1, 1, 3, 2),
(1, 2, 4, 3),
(1, 5, 1, 2),
(2, 3, 3, 80),
(2, 4, 3, 200),
(2, 5, 1, 3),
(3, 4, 3, 100),
(3, 5, 1, 3),
(3, 6, 1, 24),
(4, 7, 6, 1),
(4, 8, 7, 2),
(5, 9, 1, 6),
(5, 10, 1, 2),
(5, 11, 3, 600),
(5, 12, 8, 1),
(5, 13, 4, 1),
(6, 5, 1, 5),
(6, 14, 1, 9),
(6, 15, 3, 260);

INSERT INTO `commentaire` (`id_com`, `id_utilisateur`, `id_recette`, `commentaire`, `date_com`) VALUES
(1, 3, 1, 'Owi ! Ma copine va adorer ! :)', '2012-10-02 18:23:42'),
(2, 1, 2, 'Mhhhhhh soké', '2012-10-02 18:02:00'),
(3, 2, 2, 'Tu aimes hein ? :D', '2012-10-02 21:17:53'),
(4, 2, 1, 'Jore !', '2012-11-13 14:23:36'),
(5, 6, 4, 'Pfffff c''est toi le lapin wesh!', '2013-01-09 22:53:26'),
(6, 6, 1, 'Wesh zarm spa coul ton truq, sniportnawakuesh!', '2013-01-09 22:54:40');


CREATE USER 'cuisine_user'@'localhost' IDENTIFIED BY 'SJzEeqLb2HHeNYVV';

GRANT SELECT ,
INSERT ,

UPDATE ,
DELETE ,
FILE ON * . * TO 'cuisine_user'@'localhost' IDENTIFIED BY 'SJzEeqLb2HHeNYVV' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON `cuisine` . * TO 'cuisine_user'@'localhost';

