<?php
	include_once("Models/Joueur.class.php");
	include_once("Models/Combat.class.php");

	class mainController 
	{		
		public function __construct(){}
		
		public function invoke(){
			
			switch(filter_input(INPUT_GET, 'ajaxAction', FILTER_SANITIZE_STRING))
			{
				case"startFight":
					$nbrTours = filter_input(INPUT_GET, 'nbrTours', FILTER_SANITIZE_NUMBER_INT);
					$p1 = filter_input(INPUT_GET, 'player1', FILTER_SANITIZE_STRING);
					$p2 = filter_input(INPUT_GET, 'player2', FILTER_SANITIZE_STRING);
					if($p1 && $p2 && $nbrTours > 0){
						$testCombat = new Combat(new Joueur($p1), new Joueur($p2), 20);
						$tabActions = $testCombat->startFight();
						include_once("Views/Main/combat.php");
					}
				break;
			}
			
			switch(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING)){
				case "default":
					include_once("Views/Main/header.php");
					include_once("Views/Main/default.php");
					include_once("Views/Main/footer.php");
				break;
			}
			
		}
	}
?>