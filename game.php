<?php

if($conx=mysql_connect("localhost", "root", "")) { 
	if($db=mysql_select_db("jeux")){
	$nb=0;
if (isset($_GET['s'])) 
{


    $affiche = mysql_real_escape_string(htmlspecialchars($_GET['s'])); 
    
     $selection_affiche = mysql_query("SELECT * FROM games WHERE console='$affiche' ORDER BY rate DESC",$conx);
      
	  
	  
	  $nombre_resultats = mysql_num_rows($selection_affiche); 

    if ($nombre_resultats == 0)   echo '<h2><strong>Nous Avons pas des Jeux qui supporte cette Console...</h2></strong>';
 
    else 
    {
		
         
	    while($resultats = mysql_fetch_array($selection_affiche) ) 
    {
	$nb++;
	if(($nb-1)%3==0)  {
?>
<table width="940" height="560" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="338" valign="top">
       <?php } ?>
			<td class="grisbotle" width="300" height="550" border="0" cellspacing="0" cellpadding="0" >
<a href="index.php?select=produit&prd=InfoGame&d=<?php echo $resultats['id'] ?>"><img  src="<?php echo $resultats['img'] ?>" /></a>

				<div id="redbotle">
				<strong><?php echo $resultats['nom'] ?></strong><br/>
				<?php echo $resultats['type'].' - '.$resultats['rate'].' / 20'?><br/>
				<table width="100%">
					<tr width="100%">
						<td><strong class="strng"><?php echo $resultats['prix'] ?> DH</strong></td><td align="right"><a href="index.php?select=produit&prd=InfoGame&d=<?php echo $resultats['id'] ?>">Plus d'Info</a></td>
					</tr>
				</table>
				</div>
			</td>
			<?php if($nb%3!=0) echo  '<td width="20"></td>'; ?>
       <?php  	if(($nb)%3==0 )  { 
	  
	   echo" </tr><tr height=20></tr>";}
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
	   <?php
	    }
	   

		
		}
		
 
    }
	  
	  
	  
	  echo "</table>";
	  }
	  
	  
	  else { ?>
	  <table width="940" height="560" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="338" valign="top">
		
	  <td class="grisbotle2" width="300" border="0" cellspacing="0" cellpadding="0" style="background:#">
				<div id="redbotle2" style="color:#000">
					<?php if(isset($_GET['s'])) echo $_GET['s']; 
							else echo 'TOP 5 JEUX';
					?>
					<div style="color:#D01818;font-size:14;font-family:'2'">
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
					1. Rayman Origins 
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
					2. Resident Evil Operation 
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
					3. Anarchy Reigns
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
					4. Deus Ex Human Revolution
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div>
					5. Mass Effect 3
					</div>
				</div>
		</td>
		<td width="20"></td>
	  <?php  ;
	  
	  $selection_affiche = mysql_query("SELECT * FROM games  ORDER BY rate DESC LIMIT 0,5",$conx);
	  
	  
	 
    
    $nombre_resultats = mysql_num_rows($selection_affiche); 

    if ($nombre_resultats == 0)   echo '<h2><strong>Nous Avons pas des Jeux qui supporte cette Console...</h2></strong>';
 
    else 
    {
		
         
	    while($resultats = mysql_fetch_array($selection_affiche) ) 
    {
	$nb++;
	if($nb==3)  {
?>

<table width="940" height="560" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="338" valign="top">
		
       <?php } ?>
			<td class="grisbotle" width="300" height="550" border="0" cellspacing="0" cellpadding="0" >
	<a href="index.php?select=produit&prd=InfoGame&d=<?php echo $resultats['id'] ?>"><img  src="<?php echo $resultats['img'] ?>" /></a>

				<div id="redbotle">
				<strong><?php echo $resultats['nom'] ?></strong><br/>
				<?php echo $resultats['type'].' - '.$resultats['rate'].' / 20'?><br/>
				<table width="100%">
					<tr width="100%">
						<td><strong class="strng"><?php echo $resultats['prix'] ?> DH</strong></td><td align="right"><a href="index.php?select=produit&prd=InfoGame&d=<?php echo $resultats['id'] ?>">Plus d'Info</a></td>
					</tr>
				</table>
				</div>
			</td>
			<?php if($nb!=2  && $nb!=5) echo  '<td width="20"></td>'; ?>
       <?php  	if($nb==2 )  { 
	  
	   echo" <tr height=20></tr></tr></table>";}
	   }
	 
		
 
    }
echo "</table>" ;
	}

mysql_close($conx);

}

else die("Echec de connexion au serveur de base de données.");

}
?>