<?php
	include 'faction.php';
	
	$liste = faction::getAll();
	//print_r($liste);
	foreach ($liste as &$faction) 
	{
		$name=$faction->getName();
		$desc = $faction->getDesc();
		$lead = $faction->getLeader();
		$players =$faction->getPlayers();
		$power = $faction->getPower();
    
		
		echo 'Nom=>'.$name."</br>";
		echo 'Description=>'.$desc."</br>";
		echo 'Leader=>'.$lead."</br>";
		echo 'Membres=>'.$players."</br>";
		echo 'Power=>'.$power."</br>";
		
    
		echo "----------</br>";		
	}

?>