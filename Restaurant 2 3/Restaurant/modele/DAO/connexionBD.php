<?php

	include_once('configs/configBD.interface.php');


	class ConnexionDB {	

		private static $instance = null;
		private function __construct() {}
		public static function getInstance() {

			if(self::$instance == null) {
				$configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM;
				self::$instance = new PDO($configuration, ConfigBD::BD_UTILISATEUR, 
													 ConfigBD::BD_MOT_PASSE);
				self::$instance->exec("SET character_set_results = 'utf8'");	
				self::$instance->exec("SET character_set_client = 'utf8'");	
				self::$instance->exec("SET character_set_connection = 'utf8'");	
			}
			return self::$instance;
		}

		public static function close() {
			self::$instance = null;
		}
	}
?>