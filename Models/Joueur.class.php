<?php
	class Joueur 
	{
		private $_pseudo;
		private $_vieMax;
		private $_vieCourante;
		private	$_dmgMin;
		private $_dmgMax;
		
		public function __construct($pseudo, $vieMax = 100, $dmgMin = 0, $dmgMax = 10){
			$this->_pseudo = $pseudo;
			$this->_vieMax = $vieMax;
			$this->_vieCourante = $vieMax;
			$this->_dmgMin = $dmgMin;
			$this->_dmgMax = $dmgMax;
		}
		
		public function GetPseudo()
		{
			return $this->_pseudo;
		}
		
		public function GetVie()
		{
			return $this->_vieCourante;
		}
		
		public function GetVieMax()
		{
			return $this->_vieMax;
		}
		
		public function Heal($val)
		{
			$this->_vieCourante += $val;
			if($this->_vieCourante > $this->_vieMax)
			{
				$this->_vieCourante = _vieMax;
			}
		}
		
		public function Damage($val)
		{
			$this->_vieCourante -= $val;
			if($this->_vieCourante < 0)
			{
				$this->_vieCourante = 0;
			}
		}
		
		public function Attaquer()
		{
			return rand($this->_dmgMin, $this->_dmgMax);
		}
	}

?>
