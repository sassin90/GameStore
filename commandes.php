
<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	MES COMMANDES
	</p>
</div>
<div id="redbotle">
<?php


if (isset($_SESSION['panier'])) 
{
echo '<h3 style="color:#000000"> Le Nombre de Jeux Ajoutés Au panier '.count($_SESSION['panier']['nomProduit']).' :	</h3>';
	echo "<table width=\"100%\" >";
	echo'<tr valign=top><strong style="blue"><td>Jeu</td><td>Console</td><td>Quantité</td><td>Prix/U</td><td></td><td></td><td></td></strong></tr>';
	echo '<form method="post" action="index.php?select=panier">';
	for($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++)
      {
	?>
	<tr><td><div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div></td><td></td><td></td><td></td><td></td><td></td></tr>
	<tr>
		<form method="post" action="index.php?select=panier">
		<td><strong><?php echo $_SESSION['panier']['nomProduit'][$i];?></td><td><?php echo $_SESSION['panier']['console'][$i]; ?>
		</td><td> <?php echo $_SESSION['panier']['qteProduit'][$i]?></td><td><?php echo $_SESSION['panier']['prixProduit'][$i]?> DH</td>
		<td><a href="index.php?select=panier&name=<?php echo $_SESSION['panier']['nomProduit'][$i];?>&con=<?php echo $_SESSION['panier']['console'][$i]; ?>">Supprimer ce Jeu</a></td>
		<td><select name="qt" id="qt">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select><br/></td>
		<td><input type="hidden" name="name" value="<?php echo $_SESSION['panier']['nomProduit'][$i];?>" /></td>
		<td><input type="submit" value="Modifier Quantité" /></td>
	</tr>
	</form>
	<?php
	}
	

echo"<br/><br/><br/><br/>";
$total=0;
   for($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++)  $total+= $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
  
   echo "<tr><td><strong style='color:#D01818'>Montant Total : ".$total." DH</td><td><a href='index.php?select=account&prd=Done&tot=".$total."'><img src='image/button-valider-commande.gif'></a></td></tr>";
echo "</table>";

}
else "<p>Vous n'avez Rien Ajouter Au panier !</p>";

?>
</div>


    
    