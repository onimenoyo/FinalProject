
<?php
require 'Characters.php';
require 'Drone.php';
require 'Alien.php';
require 'Player.php';
require 'Traqueur.php';


echo '<br>';
$drone = new classes\Drone('drone');
$drone->set_lvl(3);
$traqueur = new classes\Traqueur('traqueur');
$player = new classes\Player('Johann');
$player->set_strength(14);
$player->set_dexterity(16);
$player->set_spirit(12);
echo 'initiative de '.$player->get_name() . ' : ' . $player->initiative() .'<br>';
$degatsPlayer = 10;
echo '<br>PV de Alien : ';
echo $traqueur->get_life();
echo '<br>Dégats de l\'arme de '.$player->get_name().' : ' . $degatsPlayer .'<br>';
// echo '<br>Est-ce que '.$player->get_name() . '  touche ' . $traqueur->get_name() . ' : ' . $player->touch_cac($traqueur, $degatsPlayer) .'<br>';
// echo '<br>Est-ce que '.$player->get_name() . '  touche ' . $traqueur->get_name() . ' : ' . $player->touch_cac($traqueur, $degatsPlayer) .'<br>';
// echo '<br>Est-ce que '.$player->get_name() . '  touche ' . $traqueur->get_name() . ' : ' . $player->touch_cac($traqueur, $degatsPlayer) .'<br>';
// echo '<br>Est-ce que '.$player->get_name() . '  touche ' . $traqueur->get_name() . ' : ' . $player->touch_cac($traqueur, $degatsPlayer) .'<br>';
// echo '<br>Est-ce que '.$player->get_name() . '  touche ' . $traqueur->get_name() . ' : ' . $player->touch_cac($traqueur, $degatsPlayer) .'<br>';
while(!$traqueur->is_dead() && !$player->is_dead()){
  echo '<br>'.$player->get_name() . '  attaque ' . $traqueur->get_name() . ' : ' . $player->touch_cac($traqueur,1, $degatsPlayer) .'<br>';
  if($traqueur->is_dead()){
    echo $traqueur->get_name() . ' est mort !<br>';
    die();
  }
  echo '<br>'.$traqueur->get_name() . '  attaque ' . $player->get_name() . ' : ' . $traqueur->touch_cac($player,1, $traqueur->get_deg()) .'<br>';
  if($player->is_dead()){
    echo $player->get_name() . ' est mort ! <br> Vous Avez Perdu ! <br>';
    die();
  }
}
echo 'Vie de '.$player->get_name() . ' : ' . $player->get_life() .'<br>';
echo 'CA de ' . $player->get_name() . ' : ' . $player->get_CA_player(2);
echo '<br>';
echo '<br>PV de Alien : ';
echo $traqueur->get_life();
echo '<br>';
echo $player->attaque($traqueur, $degatsPlayer);
echo '<br>PV de Alien : <br>';
echo $traqueur->get_life();
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
echo $traqueur->get_life();
echo '<br>alien attaque persoTest :<br>';
echo $traqueur->attaque($persoTest, $traqueur->get_deg()) . '<br>';
echo 'CA de alien : ' . $traqueur->get_ca();


 ?>
