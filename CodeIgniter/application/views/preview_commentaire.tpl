
{assign var='showUser' value=$showUser|default:'1'}
{assign var='showRecette' value=$showRecette|default:'1'}
<div class="commentaire">
	<h4>
		{if $showUser==1}<a href="{base_url('index.php/home/profil/'|cat:$com->id_utilisateur)}">{$com->login}</a>{/if}
		Le {$com->date_com}{if $showRecette==1} sur la recette <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$com->id_recette)}">{$com->titre}</a>{/if}
		{if $ci->_isAdmin()}
			<img class="img_sup_com" src="{base_url('images/sup_com.gif')}" title="Supprimer le commentaire" alt="Supprimer le commentaire" height="15" width="15" />
		{elseif $ci->_isLogOn() && $ci->getUser()->userdata('id_utilisateur')==$com->id_utilisateur}
			<form class="img_sup_com" action="{base_url('index.php/Membre/supprimerCommentaire')}" method="post" >
				<input type="hidden" name="id_com" value="{$com->id_com}">
				<input  type="submit" name="form_supp_com" value="Supp" >
			</form>
			<!-- <a href="{base_url('index.php/Membre/supprimerCommentaire/'|cat:$com->id_com)}" ><img class="img_sup_com" src="{base_url('images/sup_com.gif')}" title="Supprimer mon commentaire" alt="Supprimer mon commentaire" height="15" width="15" /></a> -->
		{/if}
	</h4>
	<p>{$com->commentaire}</p>
</div>
