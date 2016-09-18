<?php

if(!defined('INSIDE')){ die(header("location:../../"));}

class ShowEntrepotPage
{

	public function __construct (&$CurrentPlanet, $CurrentUser)
	{
		global $lang, $resource, $reslist, $_GET;
                $sql = 'SELECT e.*, i.*
                        FROM {{table}} AS e
                        LEFT join xgp_item AS i ON e.id_item = i.id
                        WHERE e.`id_planet` = '.$CurrentPlanet['current_planet'];
                $result = doquery($sql,'entrepot');
                $item ='';
                while($array = mysqli_fetch_array($result)){
                    $item .= '<div class="item_gouv">
                                <div class="name">
                                    <div class="col1">
                                        <img src="styles/skins/xgproyect/gebaeude/items/ico/'.$array['id_item'].'.png" />
                                    </div>
                                    <div class="col2">
                                        <a href="game.php?page=infositem&amp;gid='.$array['id_item'].'" class="infoshow tooltipship">'.$array['nom'].'</a> <br />
                                        <i>En Stock ('.$array['qts'].')</i>
                                    </div>
                                     <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>';
                }
		//print_r($data);
                $parse['item']= $item;
		display(parsetemplate(gettemplate('entrepot/entrepot_body'), $parse));
	}
}
?>