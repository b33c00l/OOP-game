<?php

class Game
{
	protected $player1;
	protected $player2;	
	protected $message;
	protected $damage;

	public function __construct(PlayerInterface $player1, PlayerInterface $player2)
	{
		$this->player1 = $player1;
		$this->player2 = $player2;

	}

	protected function calculateDamage(WeaponInterface $weapon, ArmorInterface $armor):float
	{
		$weaponDamage = rand($weapon->getMinDamage(), $weapon->getMaxDamage());
		$critical = rand(0, 100);
		if ($weaponDamage == $weapon->getMinDamage())
		{
			$reducedDamage = 0;
			$this->message = '<b> missed </b>';
			$this->damage = $reducedDamage;
			return $reducedDamage;
		} elseif ($critical <=  $weapon->getCrit())
		{
			$reducedDamage = $weaponDamage;
			$this->message = '<b> critically hit </b>';
			$this->damage = $weaponDamage *2;
			return $reducedDamage;
		} else
		{
			$reducedDamage = $weaponDamage * 100 / (100 + $armor->getAmount());
			$this->message = ' hit ';
			$this->damage = $reducedDamage;
			return $reducedDamage;

		}
	
	}

	public function start()
	{
		$i = 0;
		while (true) 
		{ 
			$i++;
			if ($this->player1->getHealth() > 0) 
			{
				$this->player1->reduceHealth($this->calculateDamage($this->player2->getWeapon(), $this->player1->getArmor()));
				if ($this->player1->getHealth() > 0) 
				{	
					echo $i. ". ". $this->player2->getName() . $this->message . $this->player1->getName() . ' with ' . $this->player2->getweapon()->getName(). " for <span style='color:red;'>". $this->damage. "</span> damage. ". $this->player1->getName(). ' remaining health: ' . round($this->player1->getHealth()). '</br>';
					$i++;
				}
	                //Dead or not
				if ($this->player1->getHealth() <= 0) 
				{
					echo '<span style="font-size:70px;">'. $this->player2->getName() .  ' won! </span> with: '. $this->player2->getWeapon()->getName(). " and ". $this->player2->getArmor()->getName();
					return false;
				} elseif ($this->player2->getHealth() > 0) 
				{
					$this->player2->reduceHealth($this->calculateDamage($this->player1->getWeapon(), $this->player2->getArmor()));
					if ($this->player2->getHealth() < 0) 
					{
					} else 
					{
						echo $i.". ". $this->player1->getName() . $this->message . $this->player2->getName() . ' with ' . $this->player1->getweapon()->getName(). " for <span style='color:blue;'>". $this->damage. "</span> damage. ". $this->player2->getName().  ' remaining health: ' . round($this->player2->getHealth()) . '</br>';
					}
	                    // Dead or not
					if ($this->player2->getHealth() <= 0) 
					{
						echo '<span style="font-size:70px;">'. $this->player1->getName() .  ' won! </span> with: '. $this->player1->getWeapon()->getName(). " and ". $this->player1->getArmor()->getName();
						return false;
					}
				}
			}
		}
	}

}

