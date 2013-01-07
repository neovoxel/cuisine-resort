
{assign var='showUser' value=$showUser|default:'1'}
{assign var='showEtat' value=$showEtat|default:'0'}
{$display=0}
{if $recette->etat=="public"}{$display=1}
{elseif $ci->_isLogOn()}
	{if $ci->getUser()->userdata('id_utilisateur')==$recette->id_utilisateur}{$display=1}
	{elseif $recette->etat=="waiting" && $ci->_isAdmin()}{$display=1}
	{/if}
{/if}
{if $display==1}
<div class="recette">
	<p>
		<a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}">
		{if is_null($recette->image_recette)}
			<img class="img_recette" src="{base_url('images/default/recette.png')}" alt="Illustration recette" height="150" width="150" />
		{else}
			<img class="img_recette" src="{base_url('images/'|cat:$recette->login|cat:'/'|cat:$recette->id_recette|cat:'/'|cat:$recette->image_recette)}" alt="Illustration recette" height="150" width="150" />
		{/if}
		</a>
	</p>
	
	<h3>
		<a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}"> {$recette->titre}</a>
		
		{if $showEtat==1}<img src="{base_url('images/'|cat:$recette->etat|cat:'.png')}" alt="{$recette->etat}" title="{$recette->etat}" height="24" width="24" />{/if}
		
		{if $ci->_isLogOn() && $ci->getUser()->userdata('id_utilisateur')==$recette->id_utilisateur}
			<form class="img_edit_recette" action="{base_url('index.php/Membre/supprimerRecette')}" method="post" >
				<input type="hidden" name="id_recette" value="{$recette->id_recette}">
				<input border=0 src="{base_url('images/sup_recette.png')}" type=image align="middle" name="form_supp_recette" value="submit" onclick="javascript:return delete_recette()" >
			</form>
			<form class="img_edit_recette" action="{base_url('index.php/Membre/editerRecette/'|cat:$recette->id_recette)}" method="post" >
				<input type="hidden" name="id_recette" value="{$recette->id_recette}">
				<input border=0 src="{base_url('images/edit_recette.gif')}" type=image align="middle" name="form_edit_recette" value="submit" >
			</form>
			<!--<img class="img_edit_recette" src="{base_url('images/edit_recette.gif')}" title="Editer la recette" alt="Editer la recette" height="24" width="24" />-->
		{/if}
	</h3>
	
	<h4>Le {$recette->date_recette}{if $showUser==1} par <a href="{base_url('index.php/home/profil/'|cat:$recette->id_utilisateur)}">{$recette->login}</a>{/if}</h4>
	
	<p class="texte_recette">{$recette->recette|truncate:250} <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$recette->id_recette)}"> Lire la suite</a></p>
	
	<p>Catégories :
		{foreach $recette->liste_categories as $categorie_recette}
			<a href="{base_url('index.php/Recettes/liste_recettes/'|cat:$categorie_recette->id_categorie)}">{$categorie_recette->nom_categorie}</a>
		{/foreach}
	</p>
</div>
{/if}