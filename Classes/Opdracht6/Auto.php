<?php
class Auto
{
	public $merk;
	public $type;
	public $kleur;
	public $kenteken;
	public $tankInhoud;
	public $verbruik;
	public $benzine = 0;
	public $kilometers = 0;
	public $heeftTrekhaak = false;
	
	public function tanken($liters)
	{
		//Tanken
		$this->benzine += $liters;
		
		//Is er niet meer getanked dan er in de tank past?
		if ($this->benzine > $this->tankInhoud)
		{
			//Te veel getanked? bereken hoe veel te veel
			$teveel = $this->benzine - $this->tankInhoud;
			
			//Corrigeer de hoeveelheid benzine naar een volle tank
			$this->benzine = $this->tankInhoud;
			
			//Return hoe veel er verspild is
			return $teveel;
		}
		else
		{
			//Niet te veel getanked, return dus geen verspilling
			return 0;
		}
	}
	
	public function rijden($kilometers)
	{
		//Bereken hoeveel benzine er verbruikt wordt
		$verbruikt = ($this->verbruik * $kilometers) / 100;
		
		//Als de auto genoeg benzine heeft
		if ($verbruikt < $this->benzine)
		{
			//Zet het aantal gereden kilometers op de teller
			$this->kilometers += $kilometers;
			
			//Haal de hoeveelheid verbruikte benzine uit de tank
			$this->benzine -= $verbruikt;
			
			//Return het aantal gereden kilometers
			return $kilometers;
		}
		
		//Als de auto niet genoeg benzine heeft
		else if ($verbruikt > $this->benzine)
		{
			//Bereken hoeveel kilometer de auto heeft gereden
			$kilometers = ($this->benzine * 100) / $this->verbruik;
			
			//Zet het aantal gereden kilometers op de teller
			$this->kilometers += $kilometers;
			
			//Haal de hoeveelheid verbruikte benzine uit de tank
			$this->benzine -= $verbruikt;
			
			//Return het aantal gereden kilometers
			return $kilometers;
		}
	}
}
?>