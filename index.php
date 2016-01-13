<?php
session_start();
?>
<!DOCTYPE HTML PU leurBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

	<title>GAME WORLD</title>
	<link href="style.css" rel="stylesheet" type="text/css">
    
    <meta charset="utf-8">
	
<!-- FlexSlider pieces -->
	<link rel="stylesheet" href="stylesheets/flexslider.css" type="text/css" media="screen" />
	<script src="javascripts/jquery-1.7.1.min.js"></script>
	<script src="javascripts/jquery.flexslider-min.js"></script>
	<!-- Hook up the FlexSlider -->
	<script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider();
		});
	</script>    
    
</head>
<body>
<div id="header"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td width="1260"> 
<div id="bodiv">
	<div id="search" align=right>
		<form method="post" action="index.php?select=home" >
			<input size="13" class="srch" type="text" name="rechercher" onFocus="if(this.value=='Search'){this.value=''};this.style.backgroundColor='#D01818'" onBlur="if(this.value==''){this.value='Search'};this.style.backgroundColor='#000'" value="" />
		</form>
	</div>
	<div id="title"><a href="index.php"><img valign=middle src="image/LOGO.png" height="116" width="129"/>AME WORLD</a></div>
	<ul id="menu1">
		<li><a href="index.php?select=home">ACCUEIL</a></li>
		<li><a href="index.php?select=produit">PRODUITS</a></li>
		<li><a href="index.php?select=service">SERVICES</a></li>
		<li><a href="index.php?select=account">COMPTE</a></li>
		<li><a href="admin/admin.php">ADMIN</a></li>
	</ul>
	<?php
	if( isset($_SESSION['pseudo']) AND isset($_SESSION['Mot_de_passe']) )
	{
	?>
		<div  align=right>
			Bonjour 
			<strong><?php  echo $_SESSION['pseudo'];?> !...&nbsp;&nbsp;</strong>
			&nbsp;&nbsp;<a class="white" href="deconnexion.php"> Se déconnecter</a>
		</div>
	<?php
	}
	else {
	?>
	<br/>
	<?php } ?>
	<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
	<div style="color:#AAA;padding-top:10px; font-size:11">FILTER</div>
	<?php 
		if(isset($_POST['rechercher']) && $_POST['rechercher']!="") include("home.php");
		elseif(isset($_GET['select']) && ($_GET['select']=='home' || $_GET['select']=='panier' || $_GET['select']=='produit' || $_GET['select']=='service' || $_GET['select']=='account' ) )
		include($_GET['select'].'.php'); 
		else include('home.php');
	?>
	<br/><br/>
	<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div><br/>
	<table width="1260" height="200" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="200" valign="top">
			<td width="300" border="0" cellspacing="0" cellpadding="0">
				LIENS<br/><br/>
				<ul id="menufooter" >
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?select=service&prd=apropos">A propos</a></li>
					<li><a href="index.php?select=service">Services</a></li>
					<li><a href="index.php?select=service&prd=acheter">Support</a></li>
					<li><a href="index.php?select=service&prd=contact">Contact</a></li>
				</ul>
			</td>	
			<td width="20"><div style="padding-top:100;border-right:0.1px dotted #AAA"></div></td>
			<td width="300" border="0" cellspacing="0" cellpadding="0">
				<div id="footerbotle" >
					<div>DEVELOPPEURS</div><br/>
					<ul id="menufooter" >
						<li><a href="#">Karim EL MADHOUN</a></li>
						<li><a href="#">Yassin BOUZID</a></li>
						<li><a href="#">Amine EL BOUKARI EL KHAMLICHI</a></li>
						<li><a href="#">Hicham BENMOUSSA</a></li>
						<li><a href="#">Mohamed Yassin ARAROU</a></li>
					</ul>
				</div>
			</td>	
			<td width="20"><div style="padding-top:100;border-right:0.1px dotted #AAA"></div></td>
			<td width="620" border="0" cellspacing="0" cellpadding="0">
				<div id="footerbotle" >
					<div>RECHERCHE</div><br/>
					<form method="post" action="index.php?select=home" >
						<input size="20" type="text" name="rechercher" class="srch" onFocus="if(this.value=='Search'){this.value=''};this.style.backgroundColor='#D01818'" onBlur="if(this.value==''){this.value='Search'};this.style.backgroundColor='#000'" value="" />
					</form>			
				</div>
			</td>
		</tr>
	</table><br/>
	<div id="title"><a style="font-size:20px;color:#666;" href="index.php">GAME WORLD</a></div>
	<div class="copyrights">©2012 GAME WORLD, INC. All rights reserved</div>
</div>
</td>
<td>&nbsp;</td>
</tr>
</table>	
</body>
</html>