
<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MODES DE PAIMENT
	</p>
</div>
<div id="redbotle" style="color:#000">

<?php

if(isset($_POST['Carte']) && isset($_POST['paiment'])) {
if(preg_match("#[0-9]{9,12}#",$_POST['Carte']) && preg_match("#[A-Za-z]+#",$_POST['paiment']) ){
setcookie('Etat', 1, time() + 365*24*3600, null, null, false, true);
setcookie('Card', $_POST['Carte'], time() + 365*24*3600, null, null, false, true);
setcookie('Mode', $_POST['paiment'], time() + 365*24*3600, null, null, false, true);


echo "Mode Choisie ".$_COOKIE['Mode'];
}
}
elseif (isset($_COOKIE['Etat']) && $_COOKIE['Etat']==1) echo "Mode Choisie ".$_COOKIE['Mode'];
else echo "<p> Vous n'avez aucun mode de paiment.</p>"; ?>
<form name="forum" method="post" action="index.php?select=account&prd=paiment&t=MODE%20DE%20PAIMENT" onSubmit="return verification(this.form)"> 
<label for="mode">Ajouter un mode de paiment&nbsp;&nbsp;</label>
			<select name="paiment" id="mode">
				<option value="Paypal">Paypal</option>
				<option value="MasterCard">Master Card</option>
				<option value="VisaCard">Visa Card</option>
				<option value="MankeyCard">Mankey Card</option>
			</select>
			<br/>N° Carte Bancaire&nbsp;&nbsp;<input size="30" type="texte" name="Carte" value="<?php if (isset($_COOKIE['Card']) && $_COOKIE['Card']!=0) echo $_COOKIE['Card'];?>">
		
		<input type="submit" value="Ajouter" onClick="verification(forum)">
</form>
</div>