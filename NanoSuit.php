<?php 
class NanoSuit implements ArmorInterface
{	
    public function getName():string
    {
    	return'Nano suit';
    }

    public function getAmount():int
    {
    	return 150;
    }
}