<?php
interface WeaponInterface
{
    public function getMaxDamage():float;
    public function getMinDamage():float;
    public function getName():string;
}