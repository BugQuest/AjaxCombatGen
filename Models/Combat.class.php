<?php
	class Combat 
	{
		private $_tabJoueur;
		private $_nbrTours;
		private $_tabAction;
		
		public function __construct($j1, $j2, $nbrTours){
			$nbr = rand(0, 1);
			$this->_tabJoueur[$nbr] = $j1;
			if($nbr == 1){$nbr--;}else{$nbr++;}
			$this->_tabJoueur[$nbr]  = $j2;
			$this->_nbrTours = $nbrTours;
			$_tabAction = [];
		}
		
		public function startFight()
		{
			$this->_tabAction = ["Debut du combat !"];
			$this->_tabAction[count($this->_tabAction)] = $this->_tabJoueur[0]->GetPseudo()." commence.";
			for($i = 0; $i <= $this->_nbrTours; $i++)
			{
				$this->_tabAction[count($this->_tabAction)] = "<fieldset>";
				$this->_tabAction[count($this->_tabAction)] = "<legend>[Tour $i]</legend>";
				
				$this->_tabAction[count($this->_tabAction)] = "<p>[".$this->_tabJoueur[0]->GetPseudo()."] Attaque : ".$this->_tabJoueur[1]->GetPseudo()."</p>";
				$atq = $this->_tabJoueur[0]->Attaquer();
				$this->_tabJoueur[1]->Damage($atq);
				$this->_tabAction[count($this->_tabAction)] = "<p>[".$this->_tabJoueur[0]->GetPseudo()."] Inflige :  $atq</p>";
				
				$this->_tabAction[count($this->_tabAction)] = "<p>[".$this->_tabJoueur[1]->GetPseudo()."] Attaque : ".$this->_tabJoueur[0]->GetPseudo()."</p>";
				$atq = $this->_tabJoueur[1]->Attaquer();
				$this->_tabJoueur[0]->Damage($atq);
				$this->_tabAction[count($this->_tabAction)] = "<p>[".$this->_tabJoueur[1]->GetPseudo()."] Inflige :  $atq</p>";
				
				$this->_tabAction[count($this->_tabAction)] = "<p>".$this->_tabJoueur[0]->GetPseudo()."[".$this->_tabJoueur[0]->GetVie()."/".$this->_tabJoueur[0]->GetVieMax()."] - ".$this->_tabJoueur[1]->GetPseudo()." [".$this->_tabJoueur[1]->GetVie()."/".$this->_tabJoueur[1]->GetVieMax()."]</p>";
				
				$this->_tabAction[count($this->_tabAction)] = "</fieldset>";
				if($this->_tabJoueur[0]->GetVie() == 0){
					$this->_tabAction[count($this->_tabAction)] = "<h2>[".$this->_tabJoueur[1]->GetPseudo()."] à Gagnié !</h2>";
					break;
				}
				else if($this->_tabJoueur[1]->GetVie() == 0){
					$this->_tabAction[count($this->_tabAction)] = "<h2>".$this->_tabJoueur[0]->GetPseudo()."à Gagnié !</h2>";
					break;
				}
			}
			$this->_tabAction[count($this->_tabAction)] = "Fin du combat !";
			return $this->_tabAction;
		}
	}
?>