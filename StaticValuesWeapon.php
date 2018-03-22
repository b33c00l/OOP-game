<?php
abstract class StaticValuesWeapon implements WeaponInterface
{
    protected $maxDamage;
    protected $minDamange;
    protected $name;  
    protected $crit;


	public function getMaxDamage():float
	{
	    return $this->maxDamage;
	}

	public function getMinDamage():float
	{
	    return $this->minDamage;
	}

	public function getName():string
	{
	    return $this->name;
	}
	public function getCrit():float
	{
		return $this->crit;
	}
}
