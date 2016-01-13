
<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MON PROFILE
	</p>
</div>
<div id="redbotle" style="color:#000">
<?php

try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
    //$reponse = $bdd->query('SELECT * FROM inscription WHERE Nom=\''.$_GET['Nom']. '\'');
	$req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = ?');
	$req->execute(array($_SESSION['pseudo']));
	while ($donnees = $req->fetch())
	{
	?>
	
	<h3 style="color:#D01818"> Paramétres Principal</h3>
	<table width="100%" >
	
	<tr><td></td><td><div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div></td><td></td></tr>
	<tr>
		<td><strong>Nom et Prénom</strong></td>
		<td><?php echo $donnees['Nom']  ; echo"      ";echo $donnees['Prenom'];  ?></td>
		
	</tr>
	
	<tr><td></td><td><div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div></td><td></td></tr>
	<tr>
		<td><strong>Adresse mail</strong></td>
		<td><?php echo $donnees['Adresse_Email']; ?></td>
		
	</tr>
	<tr><td></td><td><div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div></td><td></td></tr>
	<tr>
		<td><strong>Adresse</strong></td>
		<td><?php echo $donnees['Adresse']; ?></td>
		</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td></td><td><div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div></td><td></td></tr>
	
<tr><td><a class="white" href="index.php?select=account&prd=Changer_profil&ps=1">Modifier Mot de Passe</a></td>
	<td><a class="white" href="index.php?select=account&prd=Changer_profil&ps=0">Modifier Autre Parametres...</a></td></tr>
	
			
</table>
</div>
<?php
}
    $req->closeCursor(); 
	
	}
catch(Exception $e)
{
    
    die('Erreur : '.$e->getMessage());
}

?>

