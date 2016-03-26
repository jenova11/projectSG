<?php

if(!defined('INSIDE')){ die(header("location:../../"));}

class ShowUniversityPage
{

	public function __construct (&$CurrentPlanet, $CurrentUser)
	{
		global $lang, $resource, $reslist, $_GET;
		
		$parse= "";
		display(parsetemplate(gettemplate('gouvernement/gouvernement_body'), $parse));
	}
}
?>