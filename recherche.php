<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<title>Resultats De Recherhce</title>
</head>

<body>


<?php

if (isset($_POST['rechercher'])) {
if($conx=mysql_connect("localhost", "root", "")) 
if($db=mysql_select_db("jeux")){


    $recherche = mysql_real_escape_string(htmlspecialchars($_POST['rechercher'])); 
    
     $selection_recherche = mysql_query("SELECT * FROM games WHERE nom LIKE '%$recherche%'  ORDER BY rate DESC",$conx);
      
    $nombre_resultats = mysql_num_rows($selection_recherche); 

    if ($nombre_resultats == 0)   echo '<h2><strong>Aucun résultat. Reessayer...</h2></strong>';
 
    else 
    {
		$nb=0;
        echo '<strong>Nombre de résultats : ' . $nombre_resultats . '</strong><br /><br />';        
	    while($resultats = mysql_fetch_array($selection_recherche) ) 
    {
	$nb++;
	if(($nb-1)%3==0)  {
?>
<table width="940" height="560" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="338" valign="top">
       <?php } ?>
		   <td width="20"></td>
			<td class="grisbotle" width="300" height="550" border="0" cellspacing="0" cellpadding="0" >
				<a href="index.php?select=produit&prd=InfoGame&d=<?php echo $resultats['id'] ?>"><img  src="<?php echo $resultats['img'] ?>" /></a>
				<div id="redbotle">
				<strong><?php echo $resultats['nom'] ?></strong><br/>
				<?php echo $resultats['type'].' - '.$resultats['rate'].' / 20'?><br/>
				<table width="100%">
					<tr width="100%">
						<td><strong class="strng"><?php echo $resultats['prix'] ?> DH</strong></td><td align="right"><a href="index.php?select=produit&prd=InfoGame&d=<?php echo $resultats['id'] ?>">Plus d'info</a></td>
					</tr>
				</table>
				</div>
			</td>	
       <?php  	if(($nb)%3==0)  { echo"</tr></table>";}
	   }
	   if($nombre_resultats%3!=0){
	   for($i=0;$i<3-($nombre_resultats%3);$i++) { ?>
	   
	   <td width="20"></td>
			<td  width="300" height="550" border="0" cellspacing="0" cellpadding="0" >
				
				<div id="redbotle">
				<table width="100%">
					<tr width="100%">
						
					</tr>
				</table>
				</div>
			</td>	
	   
	   <?php }
	   
	  echo"</tr></table>";
		
		}
		
 
    }


mysql_close($conx);

}
else die("Echec de connexion au serveur de base de données.");

} ?>

				
	
</body>
</html>