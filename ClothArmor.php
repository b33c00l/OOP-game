<?php 
class ClothArmor implements ArmorInterface
{	
    public function getName():string
    {
    	return'Cloth armor';
    }

    public function getAmount():int
    {
    	return 10;
    }
}