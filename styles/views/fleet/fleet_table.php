<script language="JavaScript" src="js/flotten-min.js"></script>
<script language="JavaScript" src="js/ocnt-min.js"></script>
<br />
<div id="content">
    <table width="744" border="0" cellpadding="0" cellspacing="0">
        <tr height="20">
        	<td colspan="9" class="c">
                <table border="0" width="100%">
                    <tr>
                        <td style="background-color: transparent;">{fl_fleets} {flyingfleets} / {maxfleets}</td>
                        <td style="background-color: transparent;" align="right">{currentexpeditions} / {maxexpeditions} {fl_expeditions}</td>
                    </tr>
                </table>
        	</td>
        </tr>
        <tr height="20">
            <th>{fl_number}</th>
            <th>{fl_mission}</th>
            <th>{fl_ammount}</th>
            <th>{fl_beginning}</th>
            <th>{fl_departure}</th>
            <th>{fl_destiny}</th>
            <th>{fl_objective}</th>
            <th>{fl_arrival}</th>
            <th>{fl_order}</th>
        </tr>
            {fleetpagerow}
            {message_nofreeslot}
        </table>
        {acs_members}
        <form action="game.php?page=fleet1" method="POST">
		<div style="float:left;width:505px">
			<table width="505" border="0" cellpadding="0" cellspacing="0">
				<tr height="20">
					<td colspan="4" class="c">{fl_new_mission_title}</td>
				</tr>
				<tr height="20">
					<th>{fl_ship_type}</th>
					<th>{fl_ship_available}</th>
					<th>-</th>
					<th>-</th>
				</tr>
					{body}
				</tr>
				{none_max_selector}
				{noships_row}
				{continue_button}
			</table>
			<div class="clear"></div>
		</div>
		<div style="float:left;width:241px">
			<table width="240" border="0" cellpadding="0" cellspacing="1">
				<tr height="20">
					<td class="c" colspan="2">Mission</td>
				</tr>
				<tr>
					<th>Cible</th>
					<th><input type="text" name="galaxy" value="{galaxy}" style="float: left;width: 30px;margin-right: 3px;"/>
						<input type="text" name="system" value="{system}"  style="float: left;width: 30px;margin-right: 3px;"/>
						<input type="text" name="planet" value="{planet}" style="float: left;width: 30px;margin-right: 3px;" />
						<select name="planet_type">
							<option value="1">Planete</option>
							<option value="2">Cdr</option>
							<option value="3">Lune</option>
						</select>
						</th>
				</tr>
				<tr>
					<th>Mission</th>
					<th>
						<select name="mission">
                                                        <option value="3">Transporter</option>
							<option value="4">Stationner</option>
							<option value="1">Attaquer</option>
							<option value="6">Espionner</option>
							<option value="7">Coloniser</option>
							<option value="8">Recycler</option>
							<option value="11">Exploit&eacute;</option>
							<option value="15">Exp&eacute;ditions</option>
						</select>
					</th>
				</tr>
			</table>
		</div>
        	{shipdata}
			<input type="hidden" name="thisgalaxy" value="{target_mission}" />
			<input type="hidden" name="thissystem" value="{target_mission}" />
			<input type="hidden" name="thisplanet" value="{target_mission}" />
			   
            <input type="hidden" name="maxepedition" value="{envoimaxexpedition}" />
            <input type="hidden" name="curepedition" value="{expeditionencours}" />
            <input type="hidden" name="target_mission" value="{target_mission}" />
        </form>
</div>