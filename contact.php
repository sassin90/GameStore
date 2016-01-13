
<?php
	if(isset($_POST['email']) &&  isset($_POST['msg']) && isset($_POST['nom'])){
	if( preg_match("#[a-zA-Z_-]+#", $_POST['nom']) &&preg_match("#[A-Za-z0-9.:/-_]{2,}#", $_POST['msg'])
		&& preg_match("#[A-Za-z0-9.-_]+@[A-Za-z]{2,7}\.[a-z]{2,4}#", $_POST['email']))
		{
		$p=fopen("admin/mailconfig.txt","r+");
		fscanf($p,"SMTP = %s\nport = %d\nusername = %s\n",$host,$port,$username);
			fclose($p);
        $from = $username;
        $to = $_POST['email'];
        $subject = "Message recu !";
        $body = $_POST['msg'];

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
<p>Votrs message : '.$body.'\n A la prochaine !</p>
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
}
    ?> 









<div style="font-size:50;" >
Contactez Nous !
</div><br/>
<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
<p>Chères Visiteurs, vous avez une question ou n'importe quoi d'autre nous serons heureux de recevoir un message de votre part. Critiques, remarques, conseils, textes...etc...seront bien accueillis.</p>
<form style="padding-left:50" method="post" enctype="multipart/form-data" action="index.php?select=service&prd=contact&t=Contacter le service clients">   
	Nom *:<br/>
	<input type="text"  size="30" name="nom"  required /><br/>
	Prénom :<br/>
	<input type="text" size="30" name="prenom" /><br/>
	E-Mail* :<br/>
	<input type="email" name="email" placeholder ="Ex : Si.Flane@gmail.com" size="30" maxlength="30" required /><br/>
	Votre message * :</br>
	<textarea name="msg" rows="8" cols="35" required> </textarea><br/>
	<label for="pays">Votre pays</label><br />
	<select name="pays" id="pays">
		<option value="Maroc">Maroc</option>
		<option value="france">France</option>
		<option value="espagne">Espagne</option>
		<option value="italie">Italie</option>
		<option value="royaume-uni">Royaume-Uni</option>
		<option value="canada">Canada</option>
		<option value="etats-unis">Etats-Unis</option>
		<option value="chine">Chine</option>
		<option value="japon">Japon</option>
	</select><br/><br/>
	<INPUT TYPE="reset"  VALUE="Effacer ">
	<input type="submit" value="Envoyer" />
</form>
<p style="text-align:center;color:#000;"><strong class="alert">Note :</strong> Les champs marqués d'un <b>*</b> sont obligatoires.</p>
