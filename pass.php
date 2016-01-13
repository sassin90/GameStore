<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MON COMPTE
	</p>
</div>
<div id="redbotle" style="color:#000">
<?php
if(isset($_POST['email']) &&  isset($_POST['pseudo'])){
	if( preg_match("#[a-zA-Z_-]+#", $_POST['pseudo']) && preg_match("#[A-Za-z0-9.-_]+@[A-Za-z]{2,7}\.[a-z]{2,4}#", $_POST['email']))
		{
		try 
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=jeux', 'root', '', $pdo_options);
    $reponse=$bdd->prepare("SELECT * FROM inscription WHERE pseudo = :pseudo AND Adresse_Email = :Adresse");
	$reponse->execute(array(
	'pseudo' => $_POST['pseudo'],
	'Adresse' => $_POST['email']));
	
	if($donnees=$reponse->fetch()){
	$nvPass=rand(10000000,99999999);
	$req = $bdd->prepare('UPDATE inscription SET Mot_de_passe=:mopass WHERE pseudo=:pseudo');
$req->execute(array('mopass'=>md5($nvPass),
'pseudo' => $_POST['pseudo']));	
	
	


		$p=fopen("admin/mailconfig.txt","r+");
		fscanf($p,"SMTP = %s\nport = %d\nusername = %s\n",$host,$port,$username);
			fclose($p);
        $from = $username;
        $to = $_POST['email'];
        $subject = "Nouveau MDP!";
        $body = $nvPass;

		ini_set("SMTP",$host);
		ini_set("smtp_port",$port);
		ini_set("sendmail_from",$username);
		
		
		
		$message = '
     <html>
     <head>
 
     </head>
     <body>
<h1>Nous avons bien recu votre message</h1>
<p>Toute l\'équipe de Game Word vous saluent et espérent que vous continuerez vos suggestions !</p>
<p>Votre Nouveau Mot de Passe  : '.$body.'\n A la prochaine !</p>
     </body>
     </html>
';

		
		
       $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

     // En-têtes additionnels
$headers .= 'From: "Games Word" <zorgosteam@gmail.com>' . "\r\n";
$headers .= 'Reply-To: "Members" <'.$_POST['email'].'>' . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\n" ; 
      
		mail($to,$subject,$message,$headers );
         echo("<p>Message successfully sent!</p>");
         }
		 
		 else echo "<h2><strong>Envoi echoué...Ce Pseudo ou email n'existe Pas.</h2></strong>"; 
		 }
		 	
	catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
		 }
		 else echo "<h2><strong>Envoi echoué...Ce Pseudo ou email n'existe Pas.</h2></strong>";


	}

	?> 

<p>Entrer Votre E-mail et Pseudo Pour recevoir Un nv Mot De passe</p><br/><br/>
<form name="forum" method="post" action="index.php?select=account&prd=pass" onSubmit="return verification(this.form)"> 
E-Mail* :   
	<input type="email" name="email" placeholder ="Ex : Si.Flane@gmail.com" size="30" maxlength="30" required /><br/>
Pseudo :   	
<input type="text" name="pseudo"  maxlength="30" required /><br/><br/>
	<INPUT TYPE="reset"  VALUE="Effacer ">
	<input type="submit" value="Envoyer" />
</form></div>