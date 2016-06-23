<?php
namespace Classes;

class Traqueur extends Characters{
  protected $CA = 13;
  protected $life = 20;
  protected $lifeMax = 20;
  private $deg = 6; // Type de dés

  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée et définit ses PV en fonction de son lvl
  public function __construct($name){
    $this->name = $name;
    $this->set_lvl();
  }
  function set_lvl($lvl = 1){
    $this->lvl = $lvl;
    $this->set_life();
    $this->set_lifeMax();
    return $lvl;
  }
  function set_life(){
    $this->life = $this->life * $this->lvl;
  }

  // Retourne les dégats du mob
  public function get_deg(){
    return $this->deg;
  }
  //Dés : 1D6 + 1
  function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(1,$deg,1);
    $pvRestant = $cible->life;
    return $pvRestant;
  }
}

 ?>
