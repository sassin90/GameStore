	<ul id="menu2">
		<li><a href="index.php?select=service&prd=commencer">Commencer ici</a></li>
		<li><a href="index.php?select=service&prd=apropos">A propos</a></li>
		<li><a href="index.php?select=service&prd=contact">Nous contacter</a></li>
		<li><a href="index.php?select=service&prd=acheter">Support</a></li>
	</ul>
	<br/><br/>
	<br/>
	<table width="1260" border="0" cellspacing="0" cellpadding="0"  >
		<tr valign="top">
			<td width="900" class="grisbotle2">
				<div id="redbotle" style="color:#000">
					<?php 
						if(isset($_GET['prd']) && ($_GET['prd']=='commencer' || $_GET['prd']=='apropos' || $_GET['prd']=='contact' || $_GET['prd']=='acheter') )
							include($_GET['prd'].'.php'); 
						else
							include('commencer.php');
					?>
				</div>
			</td>
			<td width="20"></td>
			<td width="340" border="0" cellspacing="0" cellpadding="0" class="grisbotle">
				<div id="redbotle" style="font-size:17;color:#fff">
					<?php include('identite.php'); ?>
				</div>
			</td>
		</tr>
	</table>