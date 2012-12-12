
<a href="{site_url()}">Accueil</a>
<a href="{base_url('index.php/recettes')}">Les recettes</a>
<a href="{base_url('index.php/recettes')}">Rechercher</a>
{if !$ci->_isLogOn()}
	<a href="{base_url('index.php/home/connexion')}">Connexion</a>
	<a href="{base_url('index.php/home/inscription')}">Inscription</a>
{elseif $ci->_isLogOn()}
	<a href="{base_url('index.php/membre/profil')}" >Mon profil</a>
	<a href="{base_url('index.php/home/deconnexion')}">Déconnexion</a>
{/if}
