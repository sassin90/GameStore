 

<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MON COMPTE
	</p>
</div>
<div id="redbotle" style="color:#000">
<?php
if(isset($_POST['nom'] ) && isset($_POST['motpass'])){
$_POST['nom'] = htmlspecialchars($_POST['nom']);
$_POST['motpass'] = htmlspecialchars($_POST['motpass']);
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
	$req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = ? AND Mot_de_passe= ?');
	$req->execute(array($_POST['nom'],md5($_POST['motpass'])));
    while($donnees = $req->fetch())
	{
    
$_SESSION['pseudo']=$_POST['nom'];  
$_SESSION['Mot_de_passe']=$_POST['motpass']; 

    $req->closeCursor(); 
	
}
}
catch(Exception $e)
{
    
    die('Erreur : '.$e->getMessage());

}
if(isset($_SESSION['pseudo']) && isset($_SESSION['Mot_de_passe'])){
if($_SESSION['pseudo']==$_POST['nom'] && $_SESSION['Mot_de_passe']==$_POST['motpass'])
$file="logs/".$_SESSION['pseudo'].".log" ;
$date = date("d/m/Y H:i:s");
$date = "<".$date."> ";
$p=fopen($file,"a+");
fputs($p,$date);
$msg=$_SESSION['pseudo']."  Vient de se Connecter  " ;
fputs($p,$msg);
$ip="( ".$_SERVER['REMOTE_ADDR'].") \n";
fputs($p,$ip);
fclose($p);
header('Location: index.php');

}
else
{  ?>
<p style="color:#red">Votre Pseudo ou mot de passe est incorrecte, réessayez !</p>

<?php
}
}
else {
?>

<p>Identifiez-vous avec votre pseudo-name et votre motde passe pour accéder à votre compte !</p>
<?php } ?>
<form method="post" action="index.php?select=account&prd=login">   
<table width="100%" align="center">
	<tr>
		<td>Pseudo :</td> 
		<td><input type="text" size="38" name="nom"  required /></td>
	</tr>
	<tr>
		<td>Mot de passe :</td>
		<td><input type="password" size="38" name="motpass" /></td>
	</tr>
	<tr>
		<td></td>
		<td><a class="white" href="index.php?select=account&prd=pass">Mot de passe oublié?</a></td>
	</tr>
	<tr>	
		<td></td>
		<td align="center"><input type="submit" value="S'identifier" /></td>
	</tr>
</table>
</form>
<p>Pas encore inscrit ? <a class="white" href="index.php?select=account&prd=signup"> S'inscrire</a></p> 
</div>
