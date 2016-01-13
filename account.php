	<?php

?>

	<?php
	if(isset($_SESSION['pseudo']) && isset($_SESSION['Mot_de_passe']))
	{
	?>
	<ul id="menu2">
		<li><a href="index.php?select=account&prd=commandes">Mes commandes</a></li>
		<li><a href="index.php?select=account&prd=profil">Mon profil</a></li>
		<li><a href="index.php?select=account&prd=paiment">Mode de paiment</a></li>
	</ul>
	<?php
	}
	?>
	<br/><br/><br/>
	<table width="1260" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="500" valign="top">
			<td width="200" border="0" cellspacing="0" cellpadding="0" class="grisbotle2">
				<div id="redbotle2" style="color:#000">	MEMBRES RECENTS<br/>
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div><br/>
					<?php
					if($conx=mysql_connect("localhost", "root", "")) { 
					if($db=mysql_select_db("jeux")){
					$selection_affiche = mysql_query("SELECT * FROM inscription  ORDER BY id DESC LIMIT 0,5",$conx);
      
	   while($resultats = mysql_fetch_array($selection_affiche) ) 
    {
				?>
				
					<div style="color:#D01818;font-size:14;font-family:'2'">
					
						<?php echo $resultats['Pseudo'] ?>
							<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
					</div>
					<?php } ?>
				</div>
			</td>
			<td width="20" ></td>
			<td width="620" class="grisbotle2">
				
					<?php 
					
					if (isset($_SESSION['pseudo']) && isset($_SESSION['Mot_de_passe'])){
								if(isset($_GET['prd']) && ( $_GET['prd']=='commandes' ||  $_GET['prd']=='Done' || $_GET['prd']=='profil' || $_GET['prd']=='paiment' ||  $_GET['prd']=='Changer_profil'))
								
						include($_GET['prd'].'.php'); 
							else	
								include('profil.php');	
								}
					
					else {
						if(isset($_GET['prd']) && ( $_GET['prd']=='pass' || $_GET['prd']=='regles' || $_GET['prd']=='login' || $_GET['prd']=='signup' )) 
								include($_GET['prd'].'.php'); 
						else include('login.php');
					}
					?>
				</div>
			</td>
		<?php	if(!isset($_GET['prd']) ||$_GET['prd']!="commandes") { ?>
		<td width="20" ></td>
			<td width="300" height="600" border="0" cellspacing="0" cellpadding="0">
				<a href="#"><img src="image/300x600.png"/></a>
			</td> <?php } ?>
		</tr>
	</table>

<?php

mysql_close($conx);

}

else die("Echec de connexion au serveur de base de données.");
}
?>




