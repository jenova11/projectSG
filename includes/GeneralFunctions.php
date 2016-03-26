<?php

/**
 * @project XG Proyect
 * @version 2.10.x build 0000
 * @copyright Copyright (C) 2008 - 2012
 */

function unset_vars ( $prefix )
{
	$vars = array_keys ( $GLOBALS );

	for( $n = 0, $i = 0;  $i < count($vars);  $i ++ )
	{
		if ( strpos ( $vars[$i] , $prefix ) === 0 )
		{
			unset ( $GLOBALS[$vars[$i]] );

			$n ++;
		}
	}

	return  $n;
}

// READS CONFIGURATIONS
function read_config ( $config_name = '' , $all = FALSE )
{
	$configs		= xml::getInstance ( 'config.xml' );

	if ( $all )
	{
		return $configs->get_configs ();
	}
	else
	{
		return $configs->get_config ( $config_name );
	}

}

// WRITES CONFIGURATIONS
function update_config ( $config_name, $config_value )
{
	$configs		= xml::getInstance ( 'config.xml' );

	$configs->write_config ( $config_name , $config_value );
}

// DETERMINES IF THE PLAYER IS WEAK
function is_weak ( $current_points , $other_points )
{
    
    return NoobsProtection::getInstance()->is_weak ( $current_points , $other_points );
}

// DETERMINES IF THE PLAYER IS STRONG
function is_strong ( $current_points , $other_points )
{
	return NoobsProtection::getInstance()->is_strong( $current_points , $other_points );
}

// DETERMINES IF IS AN EMAIL
function valid_email ( $address )
{
	return ( !preg_match ( "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix" , $address ) ) ? FALSE : TRUE;
}

function message ( $mes , $dest = "" , $time = "3" , $topnav = FALSE , $menu = TRUE )
{
	$parse['mes']   = $mes;

	$page 			= parsetemplate ( gettemplate ( 'general/message_body' ) , $parse );

	if ( !defined ( 'IN_ADMIN' ) )
	{
		display ( $page , $topnav , ( ( $dest != "" ) ? "<meta http-equiv=\"refresh\" content=\"$time;URL=$dest\">" : "") , FALSE , $menu );
	}
	else
	{
		display ( $page , $topnav , ( ( $dest != "" ) ? "<meta http-equiv=\"refresh\" content=\"$time;URL=$dest\">" : "") , TRUE , FALSE );
	}

}

function display ($page, $topnav = TRUE, $metatags = '', $AdminPage = FALSE, $menu = TRUE)
{
	global $link, $debug, $user, $planetrow, $CurrentUser;

	if (!$AdminPage)
		$DisplayPage  = StdUserHeader($metatags);
	else
		$DisplayPage  = AdminUserHeader($metatags);

	if ($topnav)
	{
		include_once(XGP_ROOT . 'includes/functions/ShowTopNavigationBar.php');
		$DisplayPage .= ShowTopNavigationBar( $user, $planetrow );
	}

	if ($menu && !$AdminPage)
	{
		include_once(XGP_ROOT . 'includes/functions/ShowLeftMenu.php');
		$DisplayPage .= ShowLeftMenu ($user);
	}

	$DisplayPage .=  $page;
	
	
	if ($topnav)
	{
		$parse['planetlist'] 			= '<div id="coloHeader">Colonies</div>';
		$ThisUsersPlanets    			= SortUserPlanets ( $user );
		$gid							= isset ( $_GET['gid'] ) ? $_GET['gid'] : NULL;
		$page							= isset ( $_GET['page'] ) ? $_GET['page'] : NULL;
		$mode							= isset ( $_GET['mode'] ) ? $_GET['mode'] : NULL; 
		
		while ($CurPlanet = mysql_fetch_array($ThisUsersPlanets))
		{
			if ($CurPlanet["destruyed"] == 0)
			{
				$parse['planetlist'] .= '<div class="coloItem">';
				if ($CurPlanet['id'] == $CurrentUser['current_planet']){
					$parse['planetlist'] .= "";
				}
				$parse['planetlist'] .= "<a href=\"game.php?page=$page&gid=$gid&cp=".$CurPlanet['id']."&amp;mode=".$mode."&amp;re=0\">";
				if($CurPlanet['planet_type'] != 3){
					$parse['planetlist'] .= "<img src=\"styles/skins/xgproyect/planeten/small/s_".$CurPlanet['image'].".jpg\" /></a><div class=\"coloname\"><a href=\"game.php?page=$page&gid=$gid&cp=".$CurPlanet['id']."&amp;mode=".$mode."&amp;re=0\">".$CurPlanet['name'];
				}
				else
				{
					$parse['planetlist'] .= $CurPlanet['name'] . " (" . $lang['fcm_moon'] . ")";
				}
				$parse['planetlist'] .= "<br />&nbsp;[".$CurPlanet['galaxy'].":";
				$parse['planetlist'] .= "".$CurPlanet['system'].":";
				$parse['planetlist'] .= "".$CurPlanet['planet'];
				$parse['planetlist'] .= "]</a></div><div class=\"colo_action\"><a href=\"game.php?page=fleet&galaxy=".$CurPlanet['galaxy']."&system=".$CurPlanet['system']."&planet=".$CurPlanet['planet']."\"><img src=\"styles/images/target.png\" /></a>
											<a href=\"recolteAjax.php?galaxy=".$CurPlanet['galaxy']."&system=".$CurPlanet['system']."&planet=".$CurPlanet['planet']."\" class=\"recolte\"><img src=\"styles/images/recolte.png\" /></a></div>";
				$parse['planetlist'] .= "<div class=\"clear\"></div>";
				$parse['planetlist'] .= '</div>';
	
			}
		}
		$parse['planetlist'] 			.= '<div id="SecteurHeader">Exploitations</div>';
		$ThisUsersSecteurs    			= SortUserSecteurs ( $user );

		while ($CurSecteur = mysql_fetch_array($ThisUsersSecteurs))
		{
			if ($CurSecteur["destruyed"] == 0)
			{
				$parse['planetlist'] .= '<div class="coloItem">';
				if ($CurSecteur['id'] == $CurrentUser['current_planet']){
					$parse['planetlist'] .= "";
				}
				$parse['planetlist'] .= "<a href=\"game.php?page=$page&gid=$gid&cp=".$CurSecteur['id']."&amp;mode=".$mode."&amp;re=0\">";

				$parse['planetlist'] .= "<img src=\"styles/skins/xgproyect/planeten/small/s_".$CurSecteur['image'].".jpg\" /></a><div class=\"coloname\"><a href=\"game.php?page=$page&gid=$gid&cp=".$CurSecteur['id']."&amp;mode=".$mode."&amp;re=0\">".$CurSecteur['name'];
				$parse['planetlist'] .= "<br />&nbsp;[".$CurSecteur['galaxy'].":";
				$parse['planetlist'] .= "".$CurSecteur['system'].":";
				$parse['planetlist'] .= "".$CurSecteur['planet'];
				$parse['planetlist'] .= "]</a></div><div class=\"colo_action\"><a href=\"game.php?page=fleet&galaxy=".$CurSecteur['galaxy']."&system=".$CurSecteur['system']."&planet=".$CurSecteur['planet']."\"><img src=\"styles/images/target.png\" /></a></div>";
				$parse['planetlist'] .= "<div class=\"clear\"></div>";
				$parse['planetlist'] .= '</div>';
	
			}
		}
	}			
			
	
	if(!defined('LOGIN') && isset($_GET['page']))
		$DisplayPage .= parsetemplate ( gettemplate ( 'general/footer' ) , $parse );

	if ( isset ( $user['authlevel'] ) && $user['authlevel'] == 3 && read_config ( 'debug' ) == 1 && !$AdminPage )
	{
		// Convertir a objeto dom
		//$DisplayPage = str_get_html($DisplayPage);

		// Modificar div#content
		//$content = $DisplayPage->find("div#content", 0);

		// Contenido debug
		//$content->innertext .= $debug->echo_log();
	}

	echo $DisplayPage;

	if ( isset ( $user['authlevel'] ) && $user['authlevel'] == 3 && read_config ( 'debug' ) == 1 && $AdminPage && !defined('NO_DEBUG') )
	{

		echo "<center>";
		echo $debug->echo_log();
		echo "</center>";
	}

	if ( $link )
	{
		mysql_close ( $link );
	}

	die();
}






function display2 ($page)
{
	global $link, $debug, $user, $planetrow, $CurrentUser;

		$DisplayPage  = StdInfoHeader();
	

	$DisplayPage .=  $page;



	echo $DisplayPage;
	if ( $link )
	{
		mysql_close ( $link );
	}

	die();
}



function StdUserHeader ($metatags = '')
{
	$parse['-title-']	= read_config ( 'game_name' );
	$parse['-favi-']	= "<link rel=\"shortcut icon\" href=\"./favicon.ico\">\n";
	$parse['-meta-']	= "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\">\n";
	if(!defined('LOGIN'))
	{
		$parse['-style-']	= "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/css/default.css\">\n";
		$parse['-style-']  .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/css/formate.css\">\n";
		$parse['-style-']  .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"". DPATH ."formate.css\" />\n";
		$parse['-meta-']   .= "<script type=\"text/javascript\" src=\"js/overlib-min.js\"></script>\n";
	}
	else
	{
		$parse['-style-']	= "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/css/styles.css\">\n";
	}

	$parse['-meta-']	.= ($metatags) ? $metatags : "";

	return parsetemplate ( gettemplate ( 'general/simple_header' ) , $parse );
}
function StdInfoHeader ($metatags = '')
{
	$parse['-title-']	= read_config ( 'game_name' );
	$parse['-meta-']	= "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\">\n";

	if(!defined('LOGIN'))
	{
		$parse['-style-']	= "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/css/default.css\">\n";
		$parse['-style-']  .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/css/formate.css\">\n";
		$parse['-style-']  .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"". DPATH ."formate.css\" />\n";
		$parse['-meta-']   .= "<script type=\"text/javascript\" src=\"js/overlib-min.js\"></script>\n";
	}


	$parse['-meta-']	.= ($metatags) ? $metatags : "";

	return parsetemplate ( gettemplate ( 'general/info_header' ) , $parse );
}
function AdminUserHeader ($metatags = '')
{
	if (!defined('IN_ADMIN'))
	{
		$parse['-title-']	= "XG Proyect - Install";
	}
	else
	{
		$parse['-title-']	= read_config ( 'game_name' ) . " - Admin CP";
	}


	$parse['-favi-']	= 	"<link rel=\"shortcut icon\" href=\"./../favicon.ico\">\n";
	$parse['-style-']	=	"<link rel=\"stylesheet\" type=\"text/css\" href=\"./../styles/css/admin.css\">\n";
	$parse['-meta-']	= 	"<script type=\"text/javascript\" src=\"./../js/overlib-min.js\"></script>\n";
	$parse['-meta-']   .= ($metatags) ? $metatags : "";

	return parsetemplate ( gettemplate ( 'adm/simple_header' ) , $parse );
}

function CalculateMaxPlanetFields (&$planet)
{
	global $resource;
	$fild = $planet["field_max"] + ($planet[ $resource[33] ] * FIELDS_BY_TERRAFORMER) + ($planet[ $resource[10] ]*50);
        //echo $fild.'<br />';
        return $fild;
}

function GetGameSpeedFactor ()
{
	return read_config ( 'fleet_speed' ) / 2500;
}

function ShowBuildTime($time)
{
	global $lang;
	return "<br>". $lang['fgf_time'] . Format::pretty_time($time);
}

function parsetemplate ( $template , $array )
{
	return preg_replace ( '#\{([a-z0-9\-_]*?)\}#Ssie' , '( ( isset($array[\'\1\']) ) ? $array[\'\1\'] : \'\' );' , $template );
}

function gettemplate ( $templatename )
{
	return @file_get_contents ( XGP_ROOT . TEMPLATE_DIR . '/' . $templatename . '.php' );
}

function includeLang ( $filename, $language = DEFAULT_LANG )
{
	global $lang;

	include ( XGP_ROOT . "language/" . $language ."/". $filename . '.php' );
}

function GetStartAdressLink ( $FleetRow, $FleetType )
{
	$Link  = "<a href=\"game.php?page=galaxy&mode=3&galaxy=".$FleetRow['fleet_start_galaxy']."&system=".$FleetRow['fleet_start_system']."\" ". $FleetType ." >";
	$Link .= "[".$FleetRow['fleet_start_galaxy'].":".$FleetRow['fleet_start_system'].":".$FleetRow['fleet_start_planet']."]</a>";
	return $Link;
}

function GetTargetAdressLink ( $FleetRow, $FleetType )
{
	$Link  = "<a href=\"game.php?page=galaxy&mode=3&galaxy=".$FleetRow['fleet_end_galaxy']."&system=".$FleetRow['fleet_end_system']."\" ". $FleetType ." >";
	$Link .= "[".$FleetRow['fleet_end_galaxy'].":".$FleetRow['fleet_end_system'].":".$FleetRow['fleet_end_planet']."]</a>";
	return $Link;
}

function BuildPlanetAdressLink ( $CurrentPlanet )
{
	$Link  = "<a href=\"game.php?page=galaxy&mode=3&galaxy=".$CurrentPlanet['galaxy']."&system=".$CurrentPlanet['system']."\">";
	$Link .= "[".$CurrentPlanet['galaxy'].":".$CurrentPlanet['system'].":".$CurrentPlanet['planet']."]</a>";
	return $Link;
}

function doquery ( $query , $table , $fetch = FALSE )
{
	global $link, $debug;
	
	require ( XGP_ROOT . 'config.php' );

	if ( !$link )
	{
		$link = mysql_connect	(
									$dbsettings["server"],
									$dbsettings["user"],
									$dbsettings["pass"]
								) or $debug->error ( mysql_error() . "<br />$query" , "SQL Error" );

		mysql_select_db ( $dbsettings["name"] ) or $debug->error ( mysql_error() . "<br />$query" , "SQL Error" );

		echo mysql_error();
	}

	$sql 		= str_replace ( "{{table}}" , $dbsettings["prefix"] . $table , $query );
	//echo $sql.'<br />';
	$sqlquery 	= mysql_query ( $sql ) or $debug->error ( mysql_error() . "<br />$sql<br />" , "SQL Error" );

	unset ( $dbsettings );

	global $numqueries,$debug;
	$numqueries++;

	$debug->add ( "<tr><th>Query $numqueries: </th><th>$query</th><th>$table</th><th>$fetch</th></tr>");

	if ( $fetch )
	{
		return mysql_fetch_array ( $sqlquery );
	}
	else
	{
		return $sqlquery;
	}

}

function mysql_escape_value ( $inp ) 
{ 
	/* By feedr
	http://www.php.net/manual/en/function.mysql-real-escape-string.php#101248
	*/

	if ( is_array ( $inp ) )
	{
		return array_map ( __METHOD__ , $inp );	
	}  
	
	if ( ! empty ( $inp ) && is_string ( $inp ) ) 
	{ 
		return str_replace ( array ( '\\' , "\0" , "\n" , "\r" , "'" , '"' , "\x1a" ) , array ( '\\\\' , '\\0' , '\\n' , '\\r' , "\\'" , '\\"' , '\\Z' ) , $inp ); 
	} 
	
	return $inp; 
}


?>