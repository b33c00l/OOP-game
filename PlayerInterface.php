<?php
interface PlayerInterface 
{
    public function getWeapon():WeaponInterface;
    public function getArmor():ArmorInterface;
    public function getName():string;
    public function reduceHealth(float $amount);
    public function getHealth():float;
}