<ul id="menu2">
	<li><a href="index.php?select=home&prd=game&s=PC">PC</a></li>
	<li><a href="index.php?select=home&prd=game&s=XBOX 360">Xbox 360</a></li>
	<li><a href="index.php?select=home&prd=game&s=PS3">PS3</a></li>
	<li><a href="index.php?select=home&prd=game&s=PSP">PSP</a></li>
	<li><a href="index.php?select=home&prd=game&s=WII">Wii</a></li>
</ul><br/><br/>
<div id="tab1">


<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="338" valign="top">
			<td height="338">
 				<div class="flexslider-container"> <!--======Begin Flex Slider Container -->
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="img/slide-1.jpg" alt=""/>
                                    <img src="img/comingsoon2.png" alt="" style="position:absolute; left:40px; top:0; z-index:999" />
                                    <p class="flex-caption">Avengers : ALLIANCE</p>
                                </li>
                                <li>
                                    <img src="img/slide-2.jpg" alt=""/>
                                    <img src="img/comingsoon2.png" alt="" style="position:absolute; left:40px; top:0; z-index:999" />
                                    <p class="flex-caption"> One piece The Compelte Collection</p>
                                </li>
                                <li>
                                    <img src="img/slide-3.jpg" alt=""/>
                                    <img src="img/comingsoon2.png" alt="" style="position:absolute; left:40px; top:0; z-index:999" />
                                    <p class="flex-caption"> ICE AGE : The continental Drift</p>
                                </li>
                                <li>
                                    <img src="img/slide-4.jpg"  alt=""/>
                                    <img src="img/comingsoon2.png" alt="" style="position:absolute; left:40px; top:0; z-index:999" />
                                </li>
                            </ul>
                        </div>
            	</div> <br /><br /><!--======End Flex Slider Container -->     			</td>
            <td width="20"></td>
			<td width="300" style="background:#D01818;">
				<div id="redbotle">
					GAME WORLD
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div><br/>
					Consoles et Jeux-Vidéo :  Wii, Playstation 3, 
					Xbox 360, PSP et jeux PC : réservez tous les futurs hits et retrouvez 
					les derniers jeux vidéo ainsi que toutes les consoles sur gameworld.com.
				</div>
			</td>
			<td width="20" height="300"></td>
			<td class="grisbotle1" width="300" height="300">
				<div id="redbotle">
					BIENVENUE SUR GAME WORLD
					<div style="padding-top:13px; border-bottom:0.1px dotted #AAA"></div><br/>
					Que vous soyez nouveau sur Game World ou un utilisateur expérimenté, 
					nous avons tout ce qu’il vous faut pour bien démarrer.
					<ul style="list-style-type:none">
						<li><a href="index.php?select=service&prd=commencer" >Commencer sur le site</a></li>
						<li><a href="index.php?select=service&prd=acheter" >Lire comment acheter</a></li>
					</ul>
				</div>
			</td>
		</tr>
        
        
	</table>
</div><br/>
<table width="1260" border="0" cellspacing="0" cellpadding="0"  >
	<tr height="338" valign="top">
				<?php include('left_botle.php'); ?>
		
		<td width="20"></td>
		<td>
			<?php 
			if(isset($_POST['rechercher']) && $_POST['rechercher']!="" ) include("recherche.php");
			elseif(isset($_GET['prd'])&& ($_GET['prd']=='game' || $_GET['prd']=='InfoGame' ))  
				include($_GET['prd'].'.php'); 
			else include('game.php');
			?>
		</td>
	</tr>
</table><br/>