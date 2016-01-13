
<?php
		if(isset($_POST['email']) &&  isset($_POST['smtp'])   & isset($_POST['port']) )  {
		if( preg_match("#[a-zA-Z:/.]+#", $_POST['smtp']) &&preg_match("#[A-Za-z0-9]{2,}#", $_POST['mdp'])
		&& preg_match("#[A-Za-z0-9.-_]+@[A-Za-z]{2,7}\.[a-z]{2,4}#", $_POST['email'])
		&&preg_match("#[0-9]{2,4}#", $_POST['port'])){
		
		$p=fopen("admin/mailconfig.txt","w+");
		fprintf($p,"SMTP = %s\nport = %d\nemail = %s\n",$_POST['smtp'],$_POST['port'],$_POST['email']);
			fclose($p);
		echo "<strong><h2>Les paramétres ont été changé</strong></h2>" ;
		}
		else echo "<strong><h2>Certaines Paramétres sont incorrects</strong></h2>" ;
		}
		?>
	


<p>Veuillez remplir le formulaire ci-dessous afin de changer les paramétres du serveur SMTP </p><br>
<form name="jeu" method="post" action="admin.php?prd=parametres&t=Paramètres d'envoi mail" enctype="multipart/form-data"> 
	<table border=0 align="center"> 
		<tr><td>Serveur SMTP :  </td><td><input type="texte" name="smtp"></td></tr> 
<tr><td>PORT :  </td><td><input type="texte" name="port"></td></tr>
		<tr><td> EMAIL : </td><td><input type="texte" name="email"></td></tr>
				
		</table> 
	<center>
		<input type="submit" value="Changer ">
		<INPUT TYPE="reset"  VALUE="Effacer">
		
	</center>
</form>