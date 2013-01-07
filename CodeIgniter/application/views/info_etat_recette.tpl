
{assign var='etat' value=$etat|default:''}
<fieldset class="info">
<legend>Information</legend>
	<div class="no_table">
	<div class="row">
		<div class="cell"><img src="{base_url('images/'|cat:$etat|cat:'.png')}" alt="{$etat}" title="{$etat}" height="24" width="24" /></div>
		<div class="cell">
		{if $etat=='private'}
			Votre recette est actuellement privée et n'est visible que par vous.<br />
			<a>Cliquez ici</a> pour effectuer une demande de validation auprès d'un administrateur.
		{elseif $etat=='waiting'}
			Votre recette est en cours de validation par un administrateur. Vous serez notifié(e) par mail lors de sa publication.<br />
			Toute modification de votre recette la rendra de nouveau privée et vous devrez refaire une demande de validation auprès d'un administrateur pour la rendre publique.
		{elseif $etat=='public'}
			Votre recette est actuellement publique et visible par tout le monde.<br />
			Toute modification de celle-ci la rendra de nouveau privée et vous devrez refaire une demande de validation auprès d'un administrateur pour la rendre publique.
		{/if}
		</div>
	</div>
	</div>
</fieldset>
