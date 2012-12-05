
{assign var='showUser' value=$showUser|default:'1'}
{assign var='showRecette' value=$showRecette|default:'1'}
<div class="commentaire">
	<h4>{if $showUser==1}<a href="{base_url('index.php/home/profil/'|cat:$com->id_utilisateur)}">{$com->login}</a>{/if} Le {$com->date_com}{if $showRecette==1} sur la recette <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$com->id_recette)}">{$com->titre}</a>{/if}</h4>
	<p>{$com->commentaire}
	</p>
</div>
