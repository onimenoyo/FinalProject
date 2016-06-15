
<?php
require 'Characters.php';
require 'Drone.php';
require 'Alien.php';
require 'Player.php';


echo '<br>';
$drone = new classes\Drone('drone');
$drone->set_lvl(3);
$alien = new classes\Alien('alien');
$player = new classes\Player('Johann');
$player->set_strength(14);
$player->set_dexterity(16);
$player->set_spirit(12);
echo 'initiative de '.$player->get_name() . ' : ' . $player->initiative() .'<br>';
$degatsPlayer = $player->get_degats(8,2);
echo '<br>PV de Alien : <br>';
echo $alien->get_life();
echo 'Dégats de l\'arme de '.$player->get_name().' : ' . $degatsPlayer .'<br>';
echo '<br>Est-ce que '.$player->get_name() . '  touche ' . $alien->get_name() . ' : ' . $player->touch_cac($alien, $degatsPlayer) .'<br>';
echo 'Vie de '.$player->get_name() . ' : ' . $player->get_life() .'<br>';
echo 'CA de ' . $player->get_name() . ' : ' . $player->get_CA_player(2);
echo '<br>';
echo '<br>PV de Alien : <br>';
echo $alien->get_life();
echo '<br>';
echo $player->attaque($alien, $degatsPlayer);
echo '<br>PV de Alien : <br>';
echo $alien->get_life();
$persoTest =  new classes\Characters('test');
echo '<br>PV persoTest :<br>';
echo $persoTest->get_life();
echo '<br>drone attaque persoTest :<br>';
echo $drone->attaque($persoTest, $drone->get_deg());
echo '<br>drone attaque persoTest :<br>';
echo $drone->attaque($persoTest, $drone->get_deg());
echo '<br>PV de Drone : <br>';
echo $drone->get_life();
echo '<br>PV de Alien : <br>';
echo $alien->get_life();
echo '<br>alien attaque persoTest :<br>';
echo $alien->attaque($persoTest) . '<br>';
echo 'CA de alien : ' . $alien->get_ca();


 ?>
