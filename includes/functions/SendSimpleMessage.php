<?php

/**
 * @project XG Proyect
 * @version 2.10.x build 0000
 * @copyright Copyright (C) 2008 - 2012
 */

if(!defined('INSIDE')){ die(header("location:../../"));}

	function SendSimpleMessage ( $Owner, $Sender, $Time, $Type, $From, $Subject, $Message)
	{

		if ($Time == '')
		{
			$Time = time();
		}

		$Message = (strpos($Message, "/adm/") === FALSE ) ? $Message : "";
		
		//$mess = new messageModel();
		
		//$mess->message_owner = $Owner;
		//$mess->message_sender = $Sender;
		//$mess->message_time = $Time;
		//$mess->message_type = $Type;
		//$mess->message_from = $From;
		//$mess->message_subject = $Subject;
		//$mess->message_text = $Message;
		
		//___d($mess);
		
		//$mess->SaveNew();
		
		$QryInsertMessage  = "INSERT INTO {{table}} SET ";
		$QryInsertMessage .= "`message_owner` 	= '". $Owner 	."', ";
		$QryInsertMessage .= "`message_sender` 	= '". $Sender 	."', ";
		$QryInsertMessage .= "`message_time` 	= '". $Time 	."', ";
		$QryInsertMessage .= "`message_type` 	= '". mysql_real_escape_string($Type) 	."', ";
		$QryInsertMessage .= "`message_from` 	= '". $From 	."', ";
		$QryInsertMessage .= "`message_subject` = '".  mysql_real_escape_string($Subject) ."', ";
		$QryInsertMessage .= "`message_text` 	= '". mysql_real_escape_string($Message) 	."';";

		doquery( $QryInsertMessage, 'messages');

		$QryUpdateUser  = "UPDATE `{{table}}` SET ";
		$QryUpdateUser .= "`new_message` = `new_message` + 1 ";
		$QryUpdateUser .= "WHERE ";
		$QryUpdateUser .= "`id` = '". $Owner ."';";
		doquery($QryUpdateUser, "users");
	}

?>