
<?php
		if(isset($_POST['nom']) &&  isset($_POST['type']) && isset($_POST['rating'])  && isset($_POST['description']) && isset($_POST['prix'])  )  {
		if(preg_match("#[a-zA-Z0-9]+#", $_POST['nom'])&& preg_match("#[a-zA-Z]+#", $_POST['type'])
		&&preg_match("#[0-9]{1,2}#", $_POST['rating'])&& preg_match("#[A-Za-z0-9.-_]+#", $_POST['description'])
		&&preg_match("#[0-9]{2,3}#", $_POST['prix'])){
		$image_sizes = getimagesize($_FILES['image']['tmp_name']);
		if ($image_sizes[0] != 300 || $image_sizes[1] != 423) echo  "Image size incorrecte !";
		else { 
		$infosfichier = "image/pc/".$_FILES['image']['name'];
		$resultat=move_uploaded_file($_FILES['image']["tmp_name"],'image/pc/' .basename($_FILES["image"]["name"]));
		$_POST['nom'] = htmlspecialchars($_POST['nom']);
		$_POST['type'] = htmlspecialchars($_POST['type']);
		$_POST['description'] = htmlspecialchars($_POST['description']);
		
		 try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
    $req = $bdd->prepare('INSERT INTO games(nom,console,type,rate,img,description,age_requis,prix) 
	VALUES(:nom,:console,:type,:rate,:img,:description,:age,:prix)');
	$req->execute(array(
	'nom' => $_POST['nom'],
	'console'=> $_POST['console'],
	'type'=> $_POST['type'],
	'rate' => $_POST['rating'],
	'img' => $infosfichier,
	'description' => $_POST['description'],
	'age'=> $_POST['age'],
	'prix'=> $_POST['prix']
	));}
	
   
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

		echo "<h3><strong>Ce jeu a été ajouté a la liste...</br></br></strong></h3>";
		}
	}	
		
		else echo "<strong><h5> Veuillez verifier que vous avez bien rempli tous les champs...</h5></strong>"; 
	}	
	
	
	
		?>

		
<p>Veuillez remplir le formulaire ci-dessous afin d'ajouter un produit à la vitrine </p><br>
<form name="jeu" method="post" action="admin.php?&prd=ajouter&t=Ajouter un produit à la vitrine" enctype="multipart/form-data"> 
	<table border=0 align="center"> 
		<tr><td>Nom du jeu</td><td><input type="texte" name="nom"></td></tr> 
		<tr><td><label for="console">Catégorie</label></td>
			<td>
				<select name="console" id="console">
					<option value="PC">PC</option>
					<option value="XBOX 360">Xbox360</option>
					<option value="PS3">PS 3</option>
					<option value="PSP">PSP</option>
					<option value="WII">Wii</option>
				</select>
			</td>
		</tr>
		<tr><td>Type du jeu</td><td><input type="texte" name="type"></td></tr>
		<tr><td>Note du jeu </td><td><input type="texte" name="rating"></td></tr>
		<tr><td>Choisir une image</td><td><input type="file" name="image" accept="image/jpg"></td></tr>
		<tr><td valign="top">Description du jeu</td><td><textarea name="description" rows="5" cols="30" required> </textarea></td></tr>
		<tr><td><label for="age">Age requis</label></td><td>
			<select name="age" id="age">
				<option value="0">Pour tous</option>
				<option value="7">Plus 7 ans</option>
				<option value="12">Plus 12 ans</option>
				<option value="16">Plus 16 ans</option>
				<option value="18">Plus 18 ans</option>
			</select></td></tr>
		<tr><td>Prix HT</td><td><input type="texte" name="prix"></td></tr>  
	</table> 
	<center>
		<input type="submit" value="Ajouter">
		<INPUT TYPE="reset"  VALUE="Effacer">
		
	</center>
</form>