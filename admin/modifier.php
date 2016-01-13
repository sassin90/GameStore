

<?php
		if(isset($_POST['nom']))  {
		if(preg_match("#[a-zA-Z0-9]+#", $_POST['nom'])&& preg_match("#[a-zA-Z]+#", $_POST['console'])){
		$_POST['nom'] = htmlspecialchars($_POST['nom']);
		
		 try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
	if($_POST['console']=="TS") {
	$req = $bdd->prepare('DELETE FROM games WHERE nom=:nom');
	$req->execute(array(
	'nom' => $_POST['nom'])) ;
	}
    else {
	$req = $bdd->prepare('DELETE FROM games WHERE nom=:nom AND console=:con');
	$req->execute(array(
	'nom' => $_POST['nom'],
	'con'=> $_POST['console']
	));}
	
	
	}
	
   
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
		echo "<h3><strong>Ce jeu a été supprimé de  la liste...</br></br></strong></h3>";
		}
		
		
		else echo "<strong><h5> Veuillez verifier que vous avez bien rempli tous les champs...</h5></strong>"; 
	}	
	
	
	
		?>


<p>Entrer le nom du produit à supprimer: </p>
	<form method="post" enctype="multipart/form-data" action="iadmin.php?prd=modifier&t=Supprimer%20un%20produit" >
		<label for="console">Recherche par catégorie</label>
		<select name="console" id="console">
			<option value="TS">Tous les catégories</option>
			<option value="PC">PC</option>
			<option value="XBOX 360">Xbox 360</option>
			<option value="PS3">PS 3</option>
			<option value="PSP">PSP</option>
			<option value="WII">Wii</option>
		</select>
		<input type="text" name="nom" />
		<input type="submit" value="OK">
	</form>