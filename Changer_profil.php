

<?php
if($_GET['ps']==0){
?>
<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MODIFIER LES PARAMETRES DE MON PROFILE
	</p>
</div>
<div id="redbotle" style="color:#000">
<?php
if( isset($_POST['Nom'])
&&isset($_POST['Prenom'])&& isset($_POST['Date_de_naissance']) 
&&isset($_POST['Adresse'])&& isset($_POST['Code_postal'])
&&isset($_POST['Ville'])&& isset($_POST['Pays']))

{
if( preg_match("#[a-zA-Z]+#", $_POST['Nom'])
&&preg_match("#[a-zA-Z]+#", $_POST['Prenom'])&& preg_match("#^[1-2][0-9]{3}(-[0-9]{2}){2}#", $_POST['Date_de_naissance']) 
&&preg_match("#[a-zA-Z0-9._-]+#", $_POST['Adresse'])&& preg_match("#[0-9]{3,5}#", $_POST['Code_postal'])
&&preg_match("#[a-zA-Z]{3,}#", $_POST['Ville'])&& preg_match("#[a-zA-Z]{3,}#", $_POST['Pays']))

{
$_POST['Nom'] = htmlspecialchars($_POST['Nom']);
$_POST['Prenom'] = htmlspecialchars($_POST['Prenom']);
$_POST['Adresse'] = htmlspecialchars($_POST['Adresse']);
$_POST['Date_de_naissance'] = htmlspecialchars($_POST['Date_de_naissance']);
$_POST['Code_postal'] = htmlspecialchars($_POST['Code_postal']);
$_POST['Ville'] = htmlspecialchars($_POST['Ville']);
$_POST['Pays'] = htmlspecialchars($_POST['Pays']);

 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
$req = $bdd->prepare('UPDATE inscription SET Nom = :nvn,Prenom=:nvp,Date_de_naissance=:date,
 Adresse=:adresse ,Code_postal=:code,Ville=:ville,Pays=:pays WHERE pseudo = :pseudoo');

	
$req->execute(array(
    'pseudoo'=>$_SESSION['pseudo'],
	'nvn' => $_POST['Nom'],
	'nvp'=>$_POST['Prenom'],
	'date'=>$_POST['Date_de_naissance'],
 'adresse'=>$_POST['Adresse'] ,
 'code'=>$_POST['Code_postal'],
 'ville'=>$_POST['Ville'],
 'pays'=>$_POST['Pays']
	
	
	));
	$file="logs/".$_SESSION['pseudo'].".log" ;
$date = date("d/m/Y H:i:s");
$date = "<".$date."> ";
$p=fopen($file,"a+");
fputs($p,$date);
$msg=$_SESSION['pseudo']."  Vient de Changer ses Parametres ! " ;
fputs($p,$msg);
$ip="( ".$_SERVER['REMOTE_ADDR'].") \n";
fputs($p,$ip);
fclose($p);
	echo "<h3><br/><br/>&nbsp;&nbsp;Vos nouveaux parametres ont été enregistré avec succés</h3>";
	goto next ;
	}
	
else echo"<br/><br/>&nbsp;&nbsp;Certaines paramétres sont Incorrect";

}


?>
  
<form method="post" action="index.php?select=account&prd=Changer_profil&ps=0">
<p>Veuillez remplir le formulaire ci-dessous afin de  changez vos parametres de  profil.<br></p>
<strong>Vos coordonnées : </strong> Tous les champs sont obligatoires.<br/><br/> 
<table border=0 align="center">     

<?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
    
	$req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = ?');
	$req->execute(array($_SESSION['pseudo']));
    $donnees = $req->fetch();
?>
 
 
	
		<tr><td align=right>Nom&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Nom" value="<?php echo $donnees['Nom'];?>"></td></tr> 
		<tr><td align=right>Prenom&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Prenom" value="<?php echo $donnees['Prenom'];?>"></td></tr>
		<tr><td align=right>Date de naissance&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Date_de_naissance" value="<?php echo $donnees['Date_de_naissance'];?>"></td></tr>
		<tr><td align=right>Pays&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Pays" value="<?php echo $donnees['Pays'];?>"></td></tr>
		<tr><td align=right>Ville&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Ville" value="<?php echo $donnees['Ville'];?>"></td></tr>
		<tr><td align=right>Code postal&nbsp;&nbsp;</td><td><input size="30" type="number" name="Code_postal" value="<?php echo $donnees['Code_postal'];?>"></td></tr>
		<tr><td align=right>Adresse&nbsp;&nbsp;</td><td><input size="30" type="texte" name="Adresse" value="<?php echo $donnees['Adresse'];?>"></td></tr>
		
		<tr>
	</table>



<?php
    
    $req->closeCursor(); 
	
}

catch(Exception $e)
{
    
    die('Erreur : '.$e->getMessage());
}
?>


<center> 
<center><input type="submit" value="Changer"></center>  
	</div>

        
</body>
<style>
	h4{font-size:24;
		text-align:center;}
</style>
</html>
<?php 



}
else
{
?>
<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	CHANGER MON MOT DE PASSE
	</p>
</div>
<div id="redbotle" style="color:#000">
<?php

if(isset($_POST['Mot_de_passe']) &&  isset($_POST['Mot_de_passe1']) && isset($_POST['Mot_de_passe2'])){
if( $_POST['Mot_de_passe']==$_SESSION['Mot_de_passe'] && preg_match("#[a-zA-Z0-9]+#", $_POST['Mot_de_passe2'])&& 
preg_match("#[a-zA-Z0-9]+#", $_POST['Mot_de_passe1']) && $_POST['Mot_de_passe1']==$_POST['Mot_de_passe2']){

$_POST['Mot_de_passe1'] = htmlspecialchars($_POST['Mot_de_passe1']);

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
$req = $bdd->prepare('UPDATE inscription SET Mot_de_passe=:mopass WHERE pseudo=:pseudo');
$req->execute(array('mopass'=>md5($_POST['Mot_de_passe1']),
'pseudo' => $_SESSION['pseudo']));	
echo "<br/><br/><h3>&nbsp;&nbsp;Votre Mot de Passe a été changé!</h3>";
	$file="logs/".$_SESSION['pseudo'].".log" ;
$date = date("d/m/Y H:i:s");
$date = "<".$date."> ";
$p=fopen($file,"a+");
fputs($p,$date);
$msg=$_SESSION['pseudo']."  Vient de Changer Son Mot de passe! " ;
fputs($p,$msg);
$ip="( ".$_SERVER['REMOTE_ADDR'].") \n";
fputs($p,$ip);
fclose($p);

goto next ;
}
else echo "<br/><br/>&nbsp;&nbsp;Remplissez les champs Avec Un mot De passe Valide..";
}
?> 
  <br/>
<form method="post" action="index.php?select=account&prd=Changer_profil&ps=1">
<p>Veuillez remplir le formulaire ci-dessous afin de vous changez votre Mot de Passe.<br>
	</p>
<strong>Vos coordonnées : </strong> Tous les champs sont obligatoires.<br/><br/> 
<table border=0 align="center">     


 
 
	
	<tr><td align=right>Mot de passe&nbsp;&nbsp;</td><td><input size="30" type="password" name="Mot_de_passe" </td></tr>
		<tr><td align=right>Nouveau Mot de passe&nbsp;&nbsp;</td><td><input size="30" type="password" name="Mot_de_passe1" </td></tr>
		<tr><td align=right>Retaper le Nouveau Mot de Passe&nbsp;&nbsp;</td><td><input size="30" type="password" name="Mot_de_passe2" </td></tr>
		
		<tr>
	</table>





<center> 
<center><input type="submit" value="Changer"></center>  
	</div>

</div>
        
</body>
<style>
	h4{font-size:24;
		text-align:center;}
</style>
</html>
<?php
}
next: ;?>