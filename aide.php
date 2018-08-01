<? session_start();
$test = "connect.inc.php"; 
include($test);
$test = "funct/function_inscription2.php";
include($test);
$test = "funct/function_inscription.php";
include($test);
if (!isset($_SESSION['user_id'])) 
{	
	$test = "Interface/haut.php"; 
	include($test);
} 
else 
{
	$user_id = $_SESSION['user_id'];
	$test = "Interface/haut_gauche.php"; 
	include($test);
}
?>
<table valign=top width="670" cellpadding="0" cellspacing="0">
<tr><td><img src="images/aide.gif" border="0" alt="" /></td></tr>
</table>
<table width="670" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
<tr><td height="10"></td></tr>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=1" class="jaimegrave"><li>Comment s'inscrire ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "1")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Pour vous inscrire, il vous suffit de cliquer sur le lien « inscrivez-vous gratuitement », ensuite remplissez tous les champs (seuls les champs avec une * sont obligatoires).</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=2" class="jaimegrave"><li>Comment activer son compte ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "2")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Allez sur votre adresse mail, (celle rentrée lors de votre inscription). Activez votre compte, en cliquant sur : « cliquer sur ce lien d'activation ». Vous êtes redirigé sur la page « activer votre compte ». Votre code d’activation est pré rempli ; il vous suffit juste de réinscrire votre mot de passe. Validez.. Voilà, vous venez de créer votre compte sur J Life.
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=3" class="jaimegrave"><li>Comment ajouter un parcours ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "3")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul> Pour ajouter un parcours dans l’une des catégories suivantes : Écoles, Vacances, Ma Communauté, il vous suffit de cliquer « Ajouter » dans le menu de gauche et de choisir parmi : 
<br />
<br />  
PARCOURS ECOLES 
<br /> 
PARCOURS VACANCES
<br /> 
PARCOURS COMMUNAUTE
<br /> 
<br /> 
Ensuite, remplissez les champs correspondants pour les ajouter dans « mes écoles », « mes vacances », « ma communauté ».  
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=4" class="jaimegrave"><li>Comment ajouter une photo ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "4")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Dans le menu de gauche « mon compte », cliquez sur « mes photos ». Vous pouvez ajouter, modifier et supprimer vos photos. Pour cela, cliquez sur « parcourir » et sélectionnez la photo que vous voulez afficher comme photo principale. Il en est de même pour les photos d’écoles, vacances et communauté. Le pourcentage indiqué à côté de « mes photos », vous donne l’espace disponible pour insérer d’autres photos.
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=5" class="jaimegrave"><li>Comment ajouter un commentaire sur une photo ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "5")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous êtes sur la fiche d’un membre, vous avez la possibilité de poser un commentaire sur n’importe quelle photo. Pour cela, cliquez sur une des photos, elle apparaîtra alors en agrandi, et à gauche de la photo, cliquez sur « ajouter un commentaire ». Le commentaire sera par la suite, accepté ou refusé par le membre.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=6" class="jaimegrave"><li>Comment rechercher des amis ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "6")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul> Pour rechercher vos ami(e)s ou des personnes perdues de vue, allez dans le menu de gauche à « Rechercher ».Vous disposerez alors de plusieurs moyens de recherche : « Rapide », « Par écoles », « Par vacances », et « Par la communauté ».
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=7" class="jaimegrave"><li>Qu'est-ce que le zapping photos ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "7")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Le zapping photos vous permet de voir au hasard les membres inscrits sur J Life.
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=8" class="jaimegrave"><li>Comment &eacute;crire un message &agrave; un membre ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "8")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous êtes sur la fiche d’un membre, vous avez la possibilité de lui écrire un message. Allez sur son profil, en dessous de ses infos, cliquez sur « lui écrire un message », vous pourrez alors lui écrire le message que vous voulez.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=9" class="jaimegrave"><li>Comment voter pour un membre ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "9")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous êtes sur la fiche d’un membre, vous avez la possibilité de voter pour lui. Allez sur son profil, en dessous de ses infos, cliquez sur « voter pour lui ». 
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=12#salut_middle" class="jaimegrave"><li>Qu'est-ce que « envoyer ce profil à un (e) ami (e) »?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "12")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous êtes sur le profil d’un membre, vous avez la possibilité d’en aviser l’un(e) de vos ami(e)s, en le lui envoyant. Allez sur son profil, en dessous de ses infos, cliquez sur « envoyez ce profil à un(e) ami(e)».</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=13#salut_middle" class="jaimegrave"><li>Comment lire et consulter sa messagerie ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "13")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Dans le menu de gauche à « messagerie », il vous suffit de cliquer dans « boîte de réception » afin de consulter vos messages. Vous pouvez aussi, voir les messages que vous avez envoyés, dans « éléments envoyés ».</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=14#salut_middle" class="jaimegrave"><li>Comment d&eacute;poser et lire une petite annonce ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "14")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Pour déposer une petite annonce, il vous suffit de remplir les champs prévus à cet effet et de choisir la catégorie désirée. Pour consulter les annonces, il vous suffit de choisir la catégorie dans laquelle vous voulez lire les annonces.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=15#salut_middle" class="jaimegrave"><li>Comment supprimer son compte J Life ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "15")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Pour supprimer son compte, allez dans « profil » puis dans « mes infos » cliquez sur « modifier », cliquez ensuite sur le lien en haut à droite « supprimer mon compte ». Il faut savoir qu’une fois le compte supprimé, toutes les informations enregistrées dans votre profil seront effacées de notre serveur.</ul><td width="10"></td></tr>
<?
}
?>
</table>
<table width="670" cellpadding="0" cellspacing="0">
<tr><td><div class="roundedcornr_box_885585">
   <div class="roundedcornr_top_36259"><div></div></div>
      <div class="roundedcornr_content_885585">
      </div>
   <div class="roundedcornr_bottom_885585"><div></div></div>
</div></td></tr>
</table>
<? $test = "Interface/bas.php"; include $test;?>