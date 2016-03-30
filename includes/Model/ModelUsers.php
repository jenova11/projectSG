<?php
class ModelUsers {

	public $id;
	public $username;
	public $password;
	public $email;
	public $email_2;
	public $authlevel;
	public $id_planet;
	public $galaxy;
	public $system;
	public $planet;
	public $current_planet;
	public $user_lastip;
	public $ip_at_reg;
	public $user_agent;
	public $current_page;
	public $register_time;
	public $onlinetime;
	public $dpat;
	public $desig;
	public $noipcheck;
	public $planet_sor;
	public $planet_sort_order;
	public $spio_anz;
	public $settings_tooltiptime;
	public $settings_fleetactions;
	public $settings_allylogo;
	public $settings_esp;
	public $settings_wri;
	public $settings_bu;
	public $settings_mis;
	public $settings_rep;
	public $urlaubs_modus;
	public $urlaubs_until;
	public $db_deaktjava;
	public $new_message;
	public $fleet_shortcut;
	public $b_tech_planet;
	public $spy_tech;
	public $computer_tech;
	public $military_tech;
	public $defence_tech;
	public $shield_tech;
	public $energy_tech;
	public $hyperspace_tech;
	public $combustion_tech;
	public $impulse_motor_tech;
	public $hyperspace_motor_tech;
	public $laser_tech;
	public $ionic_tech;
	public $buster_tech;
	public $intergalactic_tech;
	public $expedition_tech;
	public $geologie_tech;
	public $canticcomputer_tech;
	public $graviton_tech;
	public $ally_id;
	public $ally_name;
	public $ally_request;
	public $ally_request_text;
	public $ally_register_time;
	public $ally_rank_id;
	public $current_luna;
	public $rpg_geologue;
	public $rpg_amiral;
	public $rpg_ingenieur;
	public $rpg_technocrate;
	public $darkmatter;
	public $bana;
	public $banaday;
	
	
	
	public function __construct(){
		
	}
	
	public function get(){
		
	}
	
	public function getAll(){
		
	}
	public function set($attr,$value){
		if(property_exists(${attr})){
			$this->$attr = $value;
		}
	}
	public function save(){
		
	}
}