
{assign var='showUser' value=$showUser|default:'1'}
{assign var='showRecette' value=$showRecette|default:'1'}
{assign var='redirectTo' value=$redirectTo|default:''}
<div class="commentaire">
	<h4>
		{if $showUser==1}<a href="{base_url('index.php/home/profil/'|cat:$com->id_utilisateur)}">{$com->login}</a>{/if}
		Le {$com->date_com}{if $showRecette==1} sur la recette <a href="{base_url('index.php/Recettes/detail_recette/'|cat:$com->id_recette)}">{$com->titre}</a>{/if}
		{if $ci->_isAdmin()}
			<form class="img_sup_com" action="{base_url('index.php/Admin/supprimerCommentaire')}" method="post" >
				<input type="hidden" name="id_com" value="{$com->id_com}">
				<input type="hidden" name="redirectTo" value="{$redirectTo}">
				<input border=0 src="{base_url('images/sup_com.gif')}" type=image align="middle" name="form_supp_com" value="submit" onclick="javascript:return delete_com()" >
			</form>
		{elseif $ci->_isLogOn() && $ci->getUser()->userdata('id_utilisateur')==$com->id_utilisateur}
			<form class="img_sup_com" action="{base_url('index.php/Membre/supprimerCommentaire')}" method="post" >
				<input type="hidden" name="id_com" value="{$com->id_com}">
				<input type="hidden" name="redirectTo" value="{$redirectTo}">
				<input border=0 src="{base_url('images/sup_com.gif')}" type=image align="middle" name="form_supp_com" value="submit" onclick="javascript:return delete_com()" >
			</form>
		{/if}
	</h4>
	<p>{$com->commentaire}</p>
</div>
