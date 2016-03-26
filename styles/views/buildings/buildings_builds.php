<div id="content">
    <script src="js/batiments.js"></script>
{BuildListScript} 
	<div id="BatimentImg">
		<div id="labelshipyard"><p>Batiments</p></div>
		<div id="buildlistingBat">
			<table style="background-color:black;">
				<tr>
					<td colspan="2"><center>Liste de construction</center></td>
				</tr>
                               
				{BuildList}
			</table>
		</div>
	</div>

    <div id="list-bat">
		<div id="centerListBat">
                    <div id="trie-button">
                        <button class="all active">Tous</button>
                        <button class="ressource">Ressources</button>
                        <button class="militaire">Militaires</button>
                        <button class="scientifique">Scientifiques</button>
                        <button class="civil">Civils</button>
                        <button class="exo">Exo-Structures</button>                       
                    </div>

			{BuildingsList}
			<div class="clear"></div>
		</div>
    </div>
</div>