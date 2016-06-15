<?php
namespace classes;

class Drone extends Characters{
  protected $CA = 14;
  protected $life;
  protected $lifeMax = 9;
  private $deg = 4;

  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée et définit ses PV en fonction de son lvl
  public function __construct($name){
    $this->name = $name;
    $this->set_lvl();
  }
  //Fonction pour définir son niveau qui définit ses pv
  public function set_lvl($lvl = 1){
    $this->lvl = $lvl;
    $this->set_life();
    return $lvl;
  }
  public function set_life(){
    $this->life = $this->lifeMax * $this->lvl;
  }
  public function get_deg(){
    return $this->deg;
  }

  //Dés : 1D4
  public function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(1,$deg);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }


}


 ?>
