<?php

include 'vendor/autoload.php';

$tornadoKick = new TornadoKick();
$palmSlap = new PalmSlap();
$excalibur = new Excalibur();
$clothArmor = new ClothArmor();
$chainVest = new ChainVest();
$pickAxe = new PickAxe();
$nanoSuit = new NanoSuit();
$magicalScepter = new MagicalScepter();

$player1 = new Player('John', 1000, $palmSlap, $nanoSuit);



$player2 = new Player('Chuck', 1000, $tornadoKick, $nanoSuit);

$game = new Game($player1, $player2);

$game->start();