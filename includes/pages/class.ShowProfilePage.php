<?php

if(!defined('INSIDE')){ die(header("location:../../"));}

class ShowProfilePage
{

	public function __construct ($CurrentUser){
            global $lang, $resource, $reslist, $_GET;
            $parse = array();
            $parse['pseudo'] = $CurrentUser['username'];
            $parse['sexe'] = 'Homme';
            $parse['race'] = 'Humain';
            $parse['alliance'] = $CurrentUser['ally_name'];
            $parse['g'] = $CurrentUser['galaxy'];
            $parse['s'] = $CurrentUser['system'];
            $parse['p'] = $CurrentUser['planet'];
            $parse['allyId'] = $CurrentUser['ally_id'];
            $parse['home'] = $CurrentUser['galaxy'].':'.$CurrentUser['system'].':'.$CurrentUser['planet'];
            display(parsetemplate(gettemplate('profil/profil_body'), $parse));
	}
}
?>