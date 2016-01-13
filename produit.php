	<ul id="menu2">
		<li><a href="index.php?select=produit&prd=game&s=PC">PC</a></li>
		<li><a href="index.php?select=produit&prd=game&s=XBOX 360">Xbox 360</a></li>
		<li><a href="index.php?select=produit&prd=game&s=PS3">PS3</a></li>
		<li><a href="index.php?select=produit&prd=game&s=PSP">PSP</a></li>
		<li><a href="index.php?select=produit&prd=game&s=WII">Wii</a></li>
	</ul>
	<br/><br/><br/>
	<table width="1260" border="0" cellspacing="0" cellpadding="0"  >
		<tr height="338" valign="top">
							<?php include('left_botle.php'); ?>
				
			</td>
			<td width="20"></td>
			<td>
				<?php 
				if(isset($_GET['prd']))
					include($_GET['prd'].'.php'); 
				else
						include('game.php');
				?>
			</td>
		</tr>
	</table>