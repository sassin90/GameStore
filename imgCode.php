<?php
session_start();

header ("Content-type: image/png");
$image = imagecreate(200,50);
//$blanc = imagecolorallocate($image, 255, 255, 255);
//$orange = imagecolorallocate($image, 255, 128, 0);
//$bleu = imagecolorallocate($image, 0, 0, 255);
//$bleuclair = imagecolorallocate($image, 156, 227, 254);
$blanc = imagecolorallocate($image, 255, 255, 255);
//$gris = imagecolorallocate($image, 195, 195, 195);
$rouge_fonce = imagecolorallocate($image, 208, 24, 24);
//$note=rand(10,99);
function random($char) {
$string = "";
$chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
for($i=0; $i<$char; $i++) {
$string = $chaine[rand()%strlen($chaine)];

}
return $string;
}

$_SESSION['chaine'] = random(1);
$_SESSION['chain'] = random(1);
$_SESSION['note']=rand(10,99);
$_SESSION['code']=$_SESSION['chaine'].$_SESSION['note'].$_SESSION['chain'];

imagestring($image, 5, 35, 20, $_SESSION['code'] , $rouge_fonce);
//imagestring($image, 4, 45, 15, $note , $noir);
//imagestring($image, 4, 65, 15, $chain , $noir);
imagepng($image);
//echo"$chaine$note$chain";
?>