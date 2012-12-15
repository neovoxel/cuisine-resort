
{extends 'main.tpl'}
{block name="titre"}Détail recette{/block}
{block name="output_area"}
<div id="ajouter_recette">
	<form method="post">
		Titre de la recette :
			<input name="titre" type="text" size="25" value=""><br />
		Catégorie(s) :
			<input type="checkbox" value="Entrée" name="categorie_entree">Entrée
			<input type="checkbox" value="Plat" name="categorie_plat">Plat
			<input type="checkbox" value="Dessert" name="categorie_dessert">Dessert
			<br />
		Temps de préparation :
			<input name="tps_h" type="number" size="2" value="1"> heures
			<input name="tps_m" type="number" size="2" value="0"> minutes
			<input name="tps_s" type="number" size="2" value="0"> secondes
			<br />
		<input type="reset">
	</form>
</div>
{/block}
