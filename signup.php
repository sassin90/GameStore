<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MON COMPTE
	</p>
</div>
<div id="redbotle" style="color:#000">
<?php
if (isset($_POST['Mot_de_passe']) && isset ($_POST['Nom'])
&& isset($_POST['Prenom'])&& isset($_POST['Date_de_naissance'])
&& isset($_POST['pseudo']) && isset($_POST['Adresse_Email'])
&& isset($_POST['Adresse']) && isset($_POST['Code_postal'])
&& isset($_POST['Ville']) && isset( $_POST['pays'])){
 $etat=0;
if(preg_match("#[a-zA-Z0-9._-]+#", $_POST['Mot_de_passe'])&& preg_match("#[a-zA-Z]+#", $_POST['Nom'])
&&preg_match("#[a-zA-Z]+#", $_POST['Prenom'])&& preg_match("#^[1-2][0-9]{3}(-[0-9]{2}){2}#", $_POST['Date_de_naissance'])
&&preg_match("#[a-zA-Z0-9._-]+#", $_POST['pseudo'])&& preg_match("#^[a-z0-9._-]+@[a-z._-]{2,}\.[a-z]{2,4}$#", $_POST['Adresse_Email'])
&&preg_match("#[a-zA-Z0-9._-]+#", $_POST['Adresse'])&& preg_match("#[0-9]{3,5}#", $_POST['Code_postal'])
&&preg_match("#[a-zA-Z]{3,}#", $_POST['Ville'])&& preg_match("#[a-zA-Z]{3,}#", $_POST['pays']))

{
if(isset( $_POST['ex'][0]))
{
if( $_POST['Mot_de_passe']==$_POST['Mot_de_passe2']){
if($_POST['code']==$_SESSION['code'] ){

$_POST['Nom'] = htmlspecialchars($_POST['Nom']);
$_POST['Prenom'] = htmlspecialchars($_POST['Prenom']);
$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
$_POST['Mot_de_passe'] = htmlspecialchars($_POST['Mot_de_passe']);
$_POST['Adresse_Email'] = htmlspecialchars($_POST['Adresse_Email']);
$_POST['Adresse'] = htmlspecialchars($_POST['Adresse']);
$_POST['Date_de_naissance'] = htmlspecialchars($_POST['Date_de_naissance']);
$_POST['Code_postal'] = htmlspecialchars($_POST['Code_postal']);
$_POST['Ville'] = htmlspecialchars($_POST['Ville']);
$_POST['pays'] = htmlspecialchars($_POST['pays']);

 try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
    $reponse=$bdd->prepare("SELECT * FROM inscription WHERE pseudo = :pseudo OR Adresse_Email = :Adresse");
	$reponse->execute(array(
	'pseudo' => $_POST['pseudo'],
	'Adresse' => $_POST['Adresse_Email']));
	if($donnees=$reponse->fetch()) { $etat=1; goto next1 ; }
	$req = $bdd->prepare('INSERT INTO inscription(pseudo, Mot_de_passe,Nom ,Prenom,Date_de_naissance ,Adresse_Email ,Adresse ,Code_postal,Ville,Pays) 
	VALUES(:pseudo, :Mot_de_passe,:Nom ,:Prenom,:Date_de_naissance ,:Adresse_Email ,:Adresse ,:Code_postal,:Ville,:Pays)');
	$req->execute(array(
	'pseudo' => $_POST['pseudo'],
	'Mot_de_passe'=> md5($_POST['Mot_de_passe']),
'Nom' => $_POST['Nom'],
'Prenom'=> $_POST['Prenom'],
'Date_de_naissance' => $_POST['Date_de_naissance'],
'Adresse_Email' => $_POST['Adresse_Email'],
'Adresse' => $_POST['Adresse'],
'Code_postal'=> $_POST['Code_postal'],
'Ville'=> $_POST['Ville'],
'Pays'=> $_POST['pays'],
	
	));
	
}


catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$file="logs/".$_POST['pseudo'].".log" ;
$date = date("d/m/Y H:i:s");
$date = "<".$date."> ";
$p=fopen($file,"a+");
fputs($p,$date);
$msg=$_POST['pseudo']."  Vient de S'inscrire Sur le site " ;
fputs($p,$msg);
$ip="( ".$_SERVER['REMOTE_ADDR'].") \n";
fputs($p,$ip);
fclose($p);

if (isset($_COOKIE['Etat']) && $_COOKIE['Etat']==1) $_COOKIE['Etat']=0 ;

?><h4 style="color:#18A018"><strong>Votre Inscription est validé,Bienvenue !!<br/>Si vous voulez vous connectez Par <a class="white" href="index.php?select=account&prd=login&t=MON COMPTE">ici</a>...
 </h4></strong>
<?php

 goto next ;

}


else echo "<h3><strong>Inspcription echoué...Code Captcha Incorrect,Reesayer.</h3></strong>";

}


else echo "<h3><strong>Inscription echoué...mot de passe ne correspond pas a son verification.</h3></strong>";
}

else echo "<h3><strong>Inscription echoué...Vous Devrez Lire et accepter <a href='index.php?select=account&prd=regles'>Les conditions D'utilisation.</a></h3></strong>";
}
else echo"<h3><strong>Inscription echoué...Remplissez tous les champs correctemment.</h3></strong>";

next1 :
if ($etat==1) echo "<h2><strong>Inscription echoué...Ce Pseudo ou email Existe Deja.</h2></strong>";
}
?>




<p>Veuillez remplir le formulaire ci-dessous afin de vous inscrire en tant que membre.<br>
	Vous êtes déjà inscrit ou vous voulez modifier votre compte ?<br/>
	<a class="white" href="index.php?select=account&prm=login&t=MON COMPTE">Ouvrez une session maintenant.</a>
</p>
<strong>Vos coordonnées : </strong> Tous les champs sont obligatoires.<br/><br/>
 
	<table border=0 align="center"> 
	<form method="post" action="index.php?select=account&prd=signup">

		<tr><td align=right>Nom&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Nom" value="<?php if (isset($_POST['Nom'])) echo $_POST['Nom'];?>"></td></tr> 
		<tr><td align=right>Prenom&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Prenom" value="<?php if (isset($_POST['Prenom'])) echo $_POST['Prenom'];?>"></td></tr>
		<tr><td align=right>Date de naissance&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Date_de_naissance" value="<?php if (isset($_POST['Date_de_naissance'])) echo $_POST['Date_de_naissance']?>">(EX: 1991-02-05)</td></tr>
		<tr><td align=right>Pseudo&nbsp;&nbsp;</td><td><input size="30" type="texte" name="pseudo" value="<?php if (isset($_POST['pseudo'])) echo $_POST['pseudo']?>"></td></tr>
		<tr><td align=right>Mot de passe&nbsp;&nbsp;</td><td><input size="30" type="password" name="Mot_de_passe"></td></tr>
		<tr><td align=right>Retaper le Mot de passe&nbsp;&nbsp;</td><td><input size="30" type="password" name="Mot_de_passe2"></td></tr>
		<tr><td align=right>Adresse mail&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Adresse_Email" value="<?php if (isset($_POST['Adresse_Email'])) echo $_POST['Adresse_Email']?>"></td></tr>
		<tr><td align=right><label for="pays">Votre pays</label></td>
	<td><select name="pays" id="pays" value="<?php if (isset($_POST['pays'])) echo $_POST['pays'] ?>">
		<option value="Maroc">Maroc</option>
		<option value="france">France</option>
		<option value="espagne">Espagne</option>
		<option value="italie">Italie</option>
		<option value="royaume-uni">Royaume-Uni</option>
		<option value="canada">Canada</option>
		<option value="etats-unis">Etats-Unis</option>
		<option value="chine">Chine</option>
		<option value="japon">Japon</option>
	</select><br/></td></tr>
		<tr><td align=right>Ville&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Ville" value="<?php if (isset($_POST['Ville'])) echo $_POST['Ville']?>"></td></tr>
		<tr><td align=right>Code postal&nbsp;&nbsp;</td><td><input size="30" type="number" name="Code_postal" value="<?php if (isset($_POST['Code_postal'])) echo $_POST['Code_postal']?>"></td></tr>
		<tr><td align=right>Adresse&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Adresse" value="<?php if (isset($_POST['Adresse'])) echo $_POST['Adresse']?>"></td></tr>
		<tr><td align=right></td><td>Confirmez que vous n'êtes pas une machine :&nbsp;&nbsp;</td></tr>
		<tr><td align=right>&nbsp;&nbsp;</td><td><img src="imgCode.php" /></td></tr>
		<tr><td align=right></td><td>Saisissez le code :&nbsp;&nbsp;</td></tr>
		<tr><td align=right>&nbsp;&nbsp;</td><td><input size="30" type="texte" name="code"></td></tr>
		<tr><td align=right><br/><input type="checkbox" name="ex[]" value="accept" id="accp" /></td><td><br/><label for="accp">J'accepte les <a class="white" href="index.php?select=account&prd=regles">conditions d'utilisation !</a></label></td></tr>
	</table>

<center><input type="submit" value="Inscription" /></center>
<?php 
next: 
 ?>  
 </div>