<?php 
class ChainVest implements ArmorInterface
{	
    public function getName():string
    {
    	return'Chain Vest';
    }

    public function getAmount():int
    {
    	return 50;
    }
}