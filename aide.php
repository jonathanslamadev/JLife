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
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Pour vous inscrire, il vous suffit de cliquer sur le lien � inscrivez-vous gratuitement �, ensuite remplissez tous les champs (seuls les champs avec une * sont obligatoires).</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=2" class="jaimegrave"><li>Comment activer son compte�?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "2")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Allez sur votre adresse mail, (celle rentr�e lors de votre inscription). Activez votre compte, en cliquant sur : ��cliquer sur ce lien d'activation��. Vous �tes redirig� sur la page � activer votre compte �. Votre code d�activation est pr� rempli�; il vous suffit juste de r�inscrire votre mot de passe. Validez.. Voil�, vous venez de cr�er votre compte sur J Life.
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=3" class="jaimegrave"><li>Comment ajouter un parcours ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "3")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul> Pour ajouter un parcours dans l�une des cat�gories suivantes : �coles, Vacances, Ma Communaut�, il vous suffit de cliquer � Ajouter � dans le menu de gauche et de choisir parmi : 
<br />
<br />  
PARCOURS ECOLES 
<br /> 
PARCOURS VACANCES
<br /> 
PARCOURS COMMUNAUTE
<br /> 
<br /> 
Ensuite, remplissez les champs correspondants pour les ajouter dans � mes �coles �, � mes vacances �, � ma communaut� �.  
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=4" class="jaimegrave"><li>Comment ajouter une photo ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "4")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Dans le menu de gauche � mon compte �, cliquez sur ��mes photos��. Vous pouvez ajouter, modifier et supprimer vos photos. Pour cela, cliquez sur ��parcourir�� et s�lectionnez la photo que vous voulez afficher comme photo principale. Il en est de m�me pour les photos d��coles, vacances et communaut�. Le pourcentage indiqu� � c�t� de � mes photos �, vous donne l�espace disponible pour ins�rer d�autres photos.
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=5" class="jaimegrave"><li>Comment ajouter un commentaire sur une photo ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "5")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous �tes sur la fiche d�un membre, vous avez la possibilit� de poser un commentaire sur n�importe quelle photo. Pour cela, cliquez sur une des photos, elle appara�tra alors en agrandi, et � gauche de la photo, cliquez sur � ajouter un commentaire �. Le commentaire sera par la suite, accept� ou refus� par le membre.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=6" class="jaimegrave"><li>Comment rechercher des amis ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "6")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul> Pour rechercher vos ami(e)s ou des personnes perdues de vue, allez dans le menu de gauche � � Rechercher �.Vous disposerez alors de plusieurs moyens de recherche : ��Rapide��, ��Par �coles��, ��Par vacances��, et ��Par la communaut頻.
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
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous �tes sur la fiche d�un membre, vous avez la possibilit� de lui �crire un message. Allez sur son profil, en dessous de ses infos, cliquez sur � lui �crire un message �, vous pourrez alors lui �crire le message que vous voulez.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"></td><td align="left"><a href="aide.php?id=9" class="jaimegrave"><li>Comment voter pour un membre ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "9")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous �tes sur la fiche d�un membre, vous avez la possibilit� de voter pour lui. Allez sur son profil, en dessous de ses infos, cliquez sur � voter pour lui �. 
</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=12#salut_middle" class="jaimegrave"><li>Qu'est-ce que���envoyer ce profil � un (e) ami (e)��?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "12")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Quand vous �tes sur le profil d�un membre, vous avez la possibilit� d�en aviser l�un(e) de vos ami(e)s, en le lui envoyant. Allez sur son profil, en dessous de ses infos, cliquez sur � envoyez ce profil � un(e) ami(e)�.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=13#salut_middle" class="jaimegrave"><li>Comment lire et consulter sa messagerie ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "13")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Dans le menu de gauche � � messagerie �, il vous suffit de cliquer dans � bo�te de r�ception � afin de consulter vos messages. Vous pouvez aussi, voir les messages que vous avez envoy�s, dans � �l�ments envoy�s �.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=14#salut_middle" class="jaimegrave"><li>Comment d&eacute;poser et lire une petite annonce ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "14")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Pour d�poser une petite annonce, il vous suffit de remplir les champs pr�vus � cet effet et de choisir la cat�gorie d�sir�e. Pour consulter les annonces, il vous suffit de choisir la cat�gorie dans laquelle vous voulez lire les annonces.</ul><td width="10"></td></tr>
<?
}
?>
<tr><td width="10" height="20"><td align="left"><a href="aide.php?id=15#salut_middle" class="jaimegrave"><li>Comment supprimer son compte J Life ?</li></a><td width="10"></td></tr>
<?
if (isset($_GET["id"]) && $_GET["id"] == "15")
{
?>
<tr><td width="10" height="20"></td><td align="left" align="justify"><ul>Pour supprimer son compte, allez dans � profil � puis dans � mes infos � cliquez sur � modifier �, cliquez ensuite sur le lien en haut � droite � supprimer mon compte �. Il faut savoir qu�une fois le compte supprim�, toutes les informations enregistr�es dans votre profil seront effac�es de notre serveur.</ul><td width="10"></td></tr>
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