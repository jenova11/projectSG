<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<div id="header-noir">
	<div id="ressourcesHeader">
		<img border="0" src="{dpath}images/metall.png" width="28" style="float:left;margin-top: 4px;"> <span id="metal_val" style="display:block;margin-top: 8px;float:left;margin-left: 3px;">{metal}</span>  
		<img border="0" src="{dpath}images/cristal.png" width="28" style="float:left;"> <span id="crystal_val" style="display:block;margin-top: 8px;float:left;margin-right: 5px;">{crystal}</span>  
		<img border="0" src="{dpath}images/uradium.png" width="28" style="float:left;"> <span id="deut_val" style="display:block;margin-top: 8px;float:left;margin-right: 5px;margin-left: 2px;">{deuterium}</span> 
	
		<img border="0" src="{dpath}images/energie.png" style="float:left;" width="28" ><span id="energie_val" style="display:block;margin-top: 8px;float:left;margin-left: 3px;margin-right: 13px;">{energy}</span>
                <img border="0" src="{dpath}images/gold.png" style="float:left;margin-top: 3px;" width="28" ><span id="cred_val" style="display:block;margin-top: 8px;float:left;margin-left: 3px;margin-right: 13px;">{credit}</span>
		<select size="1" onChange="eval('location=\''+this.options[this.selectedIndex].value+'\'');" style="margin-top: 4px;">
			{planetlist}
        </select>
		<div class="clear"></div>
	</div>
	<div id="head_menu">
		<a href="game.php?page=buddy">Amis</a>  -  
		<a href="#" onclick="f('game.php?page=notes', 'Notes')">Notes</a>  -  
		<a href="game.php?page=statistics&range=1">Classement</a>  -  
		<a href="game.php?page=options">Options</a>  -  
		<a href="smf/">Forum</a>  -  
		<a href="game.php?page=logout">Logout</a>
	</div>
</div>
<div id='header_top'>

<input type="hidden" id="top_metal_rate" name="top_metal_rate" value="{top_metal_rate}"/>
<input type="hidden" id="top_crystal_rate" name="top_crystal_rate" value="{top_crystal_rate}"/> 
<input type="hidden" id="top_deut_rate" name="top_deut_rate" value="{top_deut_rate}"/>
<input type="hidden" id="top_cred_rate" name="top_deut_rate" value="{top_cred_rate}"/>

<input type="hidden" id="total_metal" name="total_metal" value="{total_metal}"/>
<input type="hidden" id="total_crystal" name="total_crystal" value="{total_crystal}"/> 
<input type="hidden" id="total_deut" name="total_deut" value="{total_deut}"/>
<input type="hidden" id="total_credit" name="total_credit" value="{total_credit}"/>
{show_umod_notice}
</div>
	<div id="game">