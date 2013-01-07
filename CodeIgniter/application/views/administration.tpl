
{extends 'main.tpl'}
{block name="titre"}Welcome{/block}
{block name="scripts_area"}
{/block}
{block name="output_area"}
<div id="body">
	<h1>Page d'administration</h1>
	<p><a href="{base_url('index.php/Admin/administrationRecettes')}" >Gérer les recettes</a><br />
	Gérer les membres<br />
	Gérer les ingrédients<br />
	Gérer les unités<br />
	Gérer les catégories</p>
</div>
{/block}
