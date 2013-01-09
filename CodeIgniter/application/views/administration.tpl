
{extends 'main.tpl'}
{block name="titre"}Welcome{/block}
{block name="scripts_area"}
{/block}
{block name="output_area"}
<div id="administration">
	<h1>Page d'administration</h1>
	<div class="no_table">
		<div class="row">
			<div class="cell"><a href="{base_url('index.php/Admin/administrationRecettes')}" >Gérer les recettes</a></div>
			<div class="cell"><a href="{base_url('index.php/Admin/administrationMembres')}" >Gérer les membres</a></div>
			<div class="cell">Gérer les ingrédients</div>
			<div class="cell">Gérer les unités</div>
		</div>
	</div>
</div>
{/block}
