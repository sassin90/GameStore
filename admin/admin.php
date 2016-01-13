<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

	<title>GAME WORLD</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header"></div>
<div id="bodiv">
<div id="title"><a href="index.php">GAME WORLD</a></div>
	<ul id="menu1">
		<li><a href="../index.php?select=home">ACCUEIL</a></li>
		<li><a href="../index.php?select=produit">PRODUITS</a></li>
		<li><a href="../index.php?select=service">SERVICES</a></li>
		<li><a href="../index.php?select=account">COMPTE</a></li>
		</ul><br/>
	<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
	<div style="color:#AAA;padding-top:10px; font-size:11">FILTER</div>
	
<ul id="menu2">
	<li><a href="admin.php?prd=ajouter&t=Ajouter un produit à la vitrine">Ajouter un produit</a></li>
	<li><a href="admin.php?prd=modifier&t=Supprimer un produit">Supprimer un produit</a></li>
	<li><a href="admin.php?prd=parametres&t=Paramètres d'envoi mail">Paramètres d'envoi mail</a></li>
</ul>
<br/><br/>
<br/>
<table width="1260" border="0" cellspacing="0" cellpadding="0"  >
		<tr valign="top">
			
			<td width="20"></td>
			<td width="620" class="grisbotle2">
				<br/>
				<div id="redtab" >
					<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php 	if(isset($_GET['t']))
								echo $_GET['t'];
							else echo 'Ajouter un produit à la vitrine';
					?>
					</p>
				</div>
				<div id="redbotle" style="color:#000">
					<?php 
					if(isset($_GET['prd']))
						include($_GET['prd'].'.php'); 
					else
						include('ajouter.php');
					?>
				</div>
			</td>
			<td width="20"></td>
			<td width="300" height="600" border="0" cellspacing="0" cellpadding="0">
				<a href="#"><img src="image/300x600.png"/></a>
			</td>
		</tr>
	</table>
	</div>
	</body>