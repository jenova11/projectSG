<script src="js/main.js" type="text/javascript"></script>
<div id="content">

<div id="overview_content">
	<div id="colonie_background" style="background:url('{dpath}planeten/{planet_image}.jpg')">
		<div id="colonie_name"><a class="OverInfo" href="game.php?page=overview&mode=renameplanet" title="{Planet_menu}">{Planet} "{planet_name}"</a> ({user_username})</div>
		<div id="colonie_info">
			<u>Position :</u> [{galaxy_galaxy}:{galaxy_system}:{galaxy_planet}]<br />
			<u>Type :</u> Tellurique<br />
			<u>{ov_diameter} :</u> {planet_diameter} km <br />
			<u>{ov_temperature} :</u> {ov_temp_from} {planet_temp_min}{ov_temp_unit} {ov_temp_to} {planet_temp_max}{ov_temp_unit}<br />
			<u>Classe :</u> C<br />
			<u>Nombre de lune :</u> 0<br />
			<u>Distance de l'etoile:</u> 2,596 Md de Km<br />
			<u>Date de colonisation :</u>  11/06/2012 a 16h30<br />
			<u>Temp :</u> De 47C a 87C<br />
		</div>
	</div>
	<div id="colonie_lune">
		<div id="lune_col">Lune(s)</div>
		{moon_img}<br>{moon}
	</div>
	<div  style="border: 1px solid rgb(153, 153, 255); width: 648px;float: left;margin-top: -21px;margin-left: 2px;">
		<div style="position: absolute;">Cases occupées
			<font color="#CCF19F">{case_pourcentage}</font></div>
		<div  id="CaseBarre" style="background-color: {case_barre_barcolor}; width: {case_barre}px;float:left;height: 13px;">
		
		</div>
	</div>
	<div id="event_header"></div>
	<div id="over_message">
	<table style="width: 449px;">
            <div id="over_message_name">Messagerie</div>
		{message}
	</table>
	
	</div>
	<div id="over_fleet">
		<div id="over_control_name">Tour de contrôle</div>
		<table>
		{fleet_list}	
		</table>
	</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>