

SELECT titre, nom_ingredient, quantite, nom_unite
From ingredient I INNER JOIN Compose C ON I.id_ingredient=C.id_ingredient
INNER JOIN Recette R ON C.id_recette=R.id_recette
INNER JOIN Unite U ON I.id_unite=U.id_unite

