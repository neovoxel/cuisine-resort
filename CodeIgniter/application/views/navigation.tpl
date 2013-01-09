<table>
<tr>
<th id="nav"><a href="{site_url()}">Accueil</a></th>
<th id="nav"><a href="{base_url('index.php/recettes')}">Les recettes</a></th>
<th id="nav"><a href="{base_url('index.php/home/rechercher')}">Rechercher</a></th>
{if !$ci->_isLogOn()}
	<th id="nav"><a href="{base_url('index.php/home/connexion')}">Connexion</a></th>
	<th id="nav"><a href="{base_url('index.php/home/inscription')}">Inscription</a></th>
{elseif $ci->_isLogOn()}
	<th id="nav"><a href="{base_url('index.php/membre/profil')}" >Mon profil</a></th>
	{if $ci->_isAdmin()}
		<th id="nav"><a href="{base_url('index.php/Admin')}">Adminstration</a></th>
	{/if}
	<th id="nav"><a href="{base_url('index.php/home/deconnexion')}">Déconnexion</a></th>
{/if}
</tr>
</table>
