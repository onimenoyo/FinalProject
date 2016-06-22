<?php
namespace classes;

class FantassinAlien extends Characters{
  protected $CA = 17;
  protected $life = 20;
  protected $lifeMax = 20;
  private $deg = 8; //Type de Dés

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

  // Retourne les dégats de l'alien
  public function get_deg(){
    return $this->deg;
  }

  //Dés : 1D8 + 2
  function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(1,$deg,2);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }
}


 ?>
