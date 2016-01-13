
<br/>
<div id="redtab" >
	<p style="padding:5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	DONE !
	</p>
</div>
<div id="redbotle" style="color:#000">

<?php 
if(isset($_COOKIE['Etat']) && $_COOKIE['Etat']==1 ){
 
include('phpToPDF.php');

$pdf = new phpToPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->MultiCell(0, 10, "Merci D'avoir Considérer Nos Service!\nVoici Les Jeux Videos que Vous venez D acheter\n", 1, "C", 0);
$pdf->Cell("\n\n\n");

// Définition des propriétés du tableau.
$proprietesTableau = array(
	'TB_ALIGN' => 'L',
	'L_MARGIN' => 15,
	'BRD_COLOR' => array(0,92,177),
	'BRD_SIZE' => '0.3',
	);

// Définition des propriétés du header du tableau.	
$proprieteHeader = array(
	'T_COLOR' => array(150,10,10),
	'T_SIZE' => 10,
	'T_FONT' => 'Arial',
	'T_ALIGN' => 'C',
	'V_ALIGN' => 'T',
	'T_TYPE' => 'B',
	'LN_SIZE' => 20,
	'BG_COLOR_COL0' => array(170, 240, 230),
	'BG_COLOR' => array(170, 240, 230),
	'BRD_COLOR' => array(0,92,177),
	'BRD_SIZE' => 0.2,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
	);

// Contenu du header du tableau.	
$contenuHeader = array(
	30, 30, 40,50,
	"Jeu", "Quantité", "Prix/U","Console");

// Définition des propriétés du reste du contenu du tableau.	
$proprieteContenu = array(
	'T_COLOR' => array(0,0,0),
	'T_SIZE' => 10,
	'T_FONT' => 'Arial',
	'T_ALIGN_COL0' => 'L',
	'T_ALIGN' => 'R',
	'V_ALIGN' => 'M',
	'T_TYPE' => '',
	'LN_SIZE' => 10,
	'BG_COLOR_COL0' => array(245, 245, 150),
	'BG_COLOR' => array(255,255,255),
	'BRD_COLOR' => array(0,92,177),
	'BRD_SIZE' => 0.1,
	'BRD_TYPE' => '1',
	'BRD_TYPE_NEW_PAGE' => '',
	);	
	
	

// Contenu du tableau.	
$tmp= array();

      

      for($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++)
      
         
         {
			
            array_push( $tmp,$_SESSION['panier']['nomProduit'][$i]);
            array_push( $tmp,$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp,$_SESSION['panier']['prixProduit'][$i]);
            array_push( $tmp,$_SESSION['panier']['console'][$i]);
     
		 }


	$pdf->drawTableau($pdf, $proprietesTableau, $proprieteHeader, $contenuHeader, $proprieteContenu, $tmp);
$pdf->Cell(0, 10, " Montant ToTal ".$_GET['tot']." DH\n", 1, "C", 0);

$pdf->Output("Rapport/Jeu-Achetés.pdf");

$file="logs/".$_SESSION['pseudo'].".log" ;
$date = date("d/m/Y H:i:s");
$date = "<".$date."> ";
$p=fopen($file,"a+");
fputs($p,$date);
$nb=0;
 for($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++)
$nb+=$_SESSION['panier']['qteProduit'][$i];
$msg=$_SESSION['pseudo']."  Vient d'Acheter ".$nb." Jeux Video ! " ;
fputs($p,$msg);
$ip="( ".$_SERVER['REMOTE_ADDR'].") \n";
fputs($p,$ip);
fclose($p);
 
 $tmp=array();
      $tmp['nomProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['console'] = array();
	  $_SESSION['panier'] =  $tmp;
      unset($tmp);
   

?>
<p >Merci D'avoir Fait Confiance en Nous!<br/>Les jeux Commandés Arriveront Chez Toi 
en 2 Semaines le plus Tard  </p><br/>

<strong> Pour Telecharger Un Document qui Contient les Jeux que vous venez D'acheter Par <a href="Rapport/Jeu-Achetés.pdf">Ici</a></strong>
<?php }
 else echo "<strong>Veuillez Configurez Vos parametres de Paiement</strong>";
?>