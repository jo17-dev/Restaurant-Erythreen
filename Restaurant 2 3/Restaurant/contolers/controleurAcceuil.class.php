<?php
    // *****************************************************************************************
	// Description   : Contrôleur spécifique pour toutes les actions non-valides qui rammène à la
	//                 page d'accueil
	// Date        : 27 novembre 2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
	include_once("controleur.abstract.class.php");

	class Acceuil extends Controleur  {

		public function __construct() {
			parent::__construct();
		}

		public function executerAction():string
		{

			return "Acceuil";
		}

		


		
	}	
	
?>