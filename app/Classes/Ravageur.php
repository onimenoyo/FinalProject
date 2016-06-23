<?php
namespace classes;

class Ravageur extends Characters{
  protected $CA = 18;
  protected $life = 252;
  protected $lifeMax = 252;
  private $deg = 8; //Type de dés

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

  // Retourne les dégats du Ravageur
  public function get_deg(){
    return $this->deg;
  }

  //Dés : 2D8 + 15
  function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(2,$deg,15);
    $pvRestant = $cible->life;
    return $pvRestant;
  }
}



 ?>
