<?php
include(XGP_ROOT . 'global.php');

if ($user['authlevel'] < 1) die(message ($lang['404_page']));

$parse	=	$lang;

if ($user['authlevel'] == 3)
{
	$parse['moderation']	=	'<a href="Moderation.php?moderation=1" target="Hauptframe" class="topn">&nbsp;'.$lang['mu_moderation_page'].'&nbsp;</a>';
	$parse['authlevels']	=	'<a href="Moderation.php?moderation=2" target="Hauptframe" class="topn">&nbsp;'.$lang['ad_authlevel_title'].'&nbsp;</a>';
	$parse['resetuniverse']	=	'<a href="ResetPage.php" target="Hauptframe" class="topn">&nbsp;'.$lang['re_reset_universe'].'&nbsp;</a>';
	$parse['queries']		=	'<a href="QueriesPage.php" target="Hauptframe" class="topn">&nbsp;'.$lang['qe_title_menu'].'&nbsp;</a>';
}


display( parsetemplate(gettemplate('adm/Topnav'), $parse), FALSE, '', TRUE, FALSE);
?>