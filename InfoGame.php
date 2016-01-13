
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Informations du jeu</title>
</head>

<body>
<?php


if (isset($_GET['d']))
{

	if($conx=mysql_connect("localhost", "root", "")) {
	if($db=mysql_select_db("jeux")){

    $affich_game = mysql_real_escape_string(htmlspecialchars($_GET['d']));

     $select_game = mysql_query("SELECT * FROM games WHERE id='$affich_game' ",$conx);

	 if($resultats = mysql_fetch_array($select_game) ) {
?>

<table width="940">
<tr height="423" >
	<td  width="300">
	<img width="300" style="border-radius:30px;"  src="<?php echo $resultats['img'] ?>"/>
	</td>
	<td width="4"></td>
	<td class="grisbotle0" width="636" valign=top>
		<br/><br/>
		<div id="gtitle">
	<div style=" border-bottom:0.1px dotted #666"></div>
			&nbsp;&nbsp;<?php echo $resultats['nom'] ?>&nbsp;&nbsp;-&nbsp;&nbsp;<font id="gtype"><?php echo $resultats['type']?></font>
			
			<div style=" border-bottom:0.1px dotted #666"></div>
		</div>
		<div id="gdiscri">
			<div style="padding-top:4; border-bottom:0.1px dotted #777"></div>
		<strong>Description</strong><br/> <?php echo $resultats['description']; ?><br/>
		<div style="padding-top:4; border-bottom:0.1px dotted #777"></div>
		</div>
			<div id="redbotle2">
			<table height="100%">
				<tr valign=top >
					<td width="100" align=right>Age requis </td>
					<td width="50" align=center>:</td>
					<td width="400" align=left> <?php if($resultats['age_requis']==0) echo "Pour Tous Public"; 
					else echo "Plus de ".$resultats['age_requis'] ;?></td>
				</tr>
				<tr valign=top>
					<td align=right>Note </td>
					<td align=center>:</td>
					<td align=left><?php echo $resultats['rate'].'/ 20'?></td>
				</tr>
				<tr valign=top>
					<td align=right>Prix </td>
					<td align=center>:</td>
					<td align=left><?php echo $resultats['prix']; ?> DH</td>
				</tr>
			</table>
			<br/>
			<center ><a id="n1" href="index.php?select=panier&id=<?php echo $resultats['id'] ?>&op=1"><img style="border-radius:13px" src="image/acheter.gif"/></a></center>
		</div>
	</td>
				
		
</tr>
</table>
<br/><br/>


<?php	if(isset($_SESSION['panier'])) {
	$AuPanier=array_search($resultats['nom'],$_SESSION['panier']['nomProduit']);
	if ($AuPanier !== false)
		echo "<h3><strong style='color:blue'>Ce jeu a été Ajouté au Panier ".$_SESSION['panier']['qteProduit'][$AuPanier] ." Fois</strong></h3>";
}
		}


    }

}
mysql_close($conx);

}
      ?>
	  
	  	  </body>
</html>