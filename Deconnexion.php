<?php
$file="logs/".$_POST['pseudo'].".log" ;
$date = date("d/m/Y H:i:s");
$date = "<".$date."> ";
$p=fopen($file,"a+");
fputs($p,$date);
$msg=$_SESSION['pseudo']."  Vient de Se Deconecter Du site " ;
fputs($p,$msg);
$ip="( ".$_SERVER['REMOTE_ADDR'].") \n";
fputs($p,$ip);
fclose($p);
session_start();
unset($_SESSION['pseudo']);
unset($_SESSION['Mot_de_passe']);
unset($_SESSION['panier']);

header('Location: index.php');

?>