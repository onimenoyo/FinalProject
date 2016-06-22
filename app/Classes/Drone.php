<?php
namespace classes;

class Drone extends Characters{
  protected $CA = 14;
  protected $life = 9;
  protected $lifeMax = 9;
  private $deg = 4; //Type de Dés

  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée et définit ses PV en fonction de son lvl
  public function __construct($name){
    $this->name = $name;
    $this->set_lvl();
  }
  //Fonction pour définir son niveau qui définit ses pv
  public function set_lvl($lvl = 1){
    $this->lvl = $lvl;
    $this->set_life();
    $this->set_lifeMax();
    return $lvl;
  }
  public function set_life(){
    $this->life = $this->life * $this->lvl;
  }

  // Retourne les dégats du drone
  public function get_deg(){
    return $this->deg;
  }

  //Dés : 1D4
  public function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(1,$deg,0);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }


}


 ?>
