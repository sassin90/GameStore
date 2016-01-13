<?php

if(!isset($_SESSION['pseudo']) OR !isset($_SESSION['Mot_de_passe']))
{
?>
<td class="grisbotle1" width="300" border="0" cellspacing="0" cellpadding="0">
<div id="redbotle">
OUVRIRE UNE SESSION
<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
<p>Ouvrez une session pour acheter, enchérir ou pour gérer votre compte.</p>
<center><a href="#iden">Ouvrir une session</a></center><br>
PAS ENCORE INSCRIT ?
<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
<p>Rejoignez les millions de personnes qui font déjà partie de la famille du site.</p>
<center><a href="index.php?select=account&prd=signup&t=Inscriver Vous sur Game World">Inscrivez-vous</a></center><br/>
<div id="iden">MON COMPTE
	<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
	<p>Identifiez-vous avec votre pseudo-name et votre motde passe pour accéder à votre compte !</p>
	<form method="post" action="index.php?select=account&prd=login">   
		<table width="100%" align="center">
			<tr>
				<td style="color:#fff;">Pseudo :</td> 
				<td><input type="text" name="nom"  required /></td>
			</tr>
			<tr>
				<td style="color:#fff;">Mot de passe :</td>
				<td><input type="password" name="motpass" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="index.php?select=account&prd=pass">Mot de passe oublié?</a></td>
			</tr>
			<tr>	
				<td></td>
				<td align="right"><input type="submit" value="S'identifier" /></td>
			</tr>
		</table>
	</form>
	<p>Pas encore inscrit ? <a href="index.php?select=account&prd=signup"> S'inscrire</a></p>
</div>
</div>
<?php
}
else 
{
?>
<td class="grisbotle1" width="300" border="0" cellspacing="0" cellpadding="0" style="background:#333;border-radius:13px;">
<div id="connect">
TOUS LES CATEGORIES
</div>
<br/>
<ul  id="menuleft">
	<li><a href="index.php?select=produit&prd=game&s=PC">JEUX PC</a></li>
	<li><a href="index.php?select=produit&prd=game&s=PC">XBOX 360</a></li>
	<li><a href="index.php?select=produit&prd=game&s=PC">PLAYSTATION 3</a></li>
	<li><a href="index.php?select=produit&prd=game&s=PC">PSP</a></li>
	<li><a href="index.php?select=produit&prd=game&s=PC">WII</a></li>
</ul>
</div>
</td>

<?php
}

?>