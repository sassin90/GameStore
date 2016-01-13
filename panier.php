<?php

function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['nomProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['console'] = array();
   }
   return 1;
}

function ajouterArticle($nomProduit,$prixProduit,$console){

   //Si le panier existe
   if (creationPanier())
   {
   
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($nomProduit,  $_SESSION['panier']['nomProduit']);

      if ($positionProduit !== false)
      {
		if($_SESSION['panier']['qteProduit'][$positionProduit]<5)
         $_SESSION['panier']['qteProduit'][$positionProduit] += 1 ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['nomProduit'],$nomProduit);
         array_push( $_SESSION['panier']['qteProduit'],1);
         array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
		 array_push( $_SESSION['panier']['console'],$console);
 
	  }
   }
   else echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



function modifierQTeArticle($nomProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($nomProduit,  $_SESSION['panier']['nomProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($nomProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


function supprimerArticle($nomProduit,$console){
   //Si le panier existe
   if (creationPanier())
   {
      $tmp=array();
      $tmp['nomProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['console'] = array();

      for($i = 0; $i < count($_SESSION['panier']['nomProduit']); $i++)
      {
         if ($_SESSION['panier']['nomProduit'][$i] == $nomProduit && $_SESSION['panier']['console'][$i] == $console) continue ;
         {
            array_push( $tmp['nomProduit'],$_SESSION['panier']['nomProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            array_push( $tmp['console'],$_SESSION['panier']['console'][$i]);
     
		 }

      }
     
      $_SESSION['panier'] =  $tmp;
	  
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}




if(isset($_SESSION['pseudo']) && isset($_SESSION['Mot_de_passe'])){
if(isset($_GET['id']) ){
if($conx=mysql_connect("localhost", "root", "")) {
if($db=mysql_select_db("jeux")){

    $recherche = mysql_real_escape_string(htmlspecialchars($_GET['id'])); 
    
     $selection_recherche = mysql_query("SELECT * FROM games WHERE id=$recherche",$conx);
      
    $nombre_resultats = mysql_num_rows($selection_recherche); 

    if ($nombre_resultats == 0)   echo '<h2><strong>Ce jeu n\'est pas Dispo sur Notre Site</h2></strong>';
 
    elseif( $resultats = mysql_fetch_array($selection_recherche) ) {
		$nomProduit=$resultats['nom'];
		$prixProduit=$resultats['prix'];
		$console=$resultats['console'];
    }

creationPanier();
ajouterArticle($nomProduit,$prixProduit,$console);
header('Location:index.php?select=produit&prd=InfoGame&d='.$resultats['id'].'#n1');
}
mysql_close($conx);
}
else die("Echec de connexion au serveur de base de données.");
}
if(isset($_GET['name']) && isset($_GET['con'])){
$nomProduit=htmlspecialchars($_GET['name']);
$console=htmlspecialchars($_GET['con']);
supprimerArticle($nomProduit,$console);
header('Location:index.php?select=account&prd=commandes');
}

if(isset($_POST['name']) && isset($_POST['qt']) && $_POST['qt']<=5 ) {
$nomProduit=htmlspecialchars($_POST['name']);
modifierQTeArticle($nomProduit,$_POST['qt']);
header('Location:index.php?select=account&prd=commandes');
}
}
else echo "<h2><strong>Vous Devez Vous connecter Si vous Voulez Achetez Nos produit! Par <a href='index.php?select=account'>ici</a></h2></strong>"
		
?>