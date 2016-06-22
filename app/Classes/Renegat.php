<?php
namespace classes;

//Monstre Rare (Dangereux)
class Renegat extends Characters{
  protected $CA = 20;
  protected $life = 91;
  protected $lifeMax = 91;
  private $deg = 6;
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

  // Retourne les dégats du Renegat
  public function get_deg(){
    return $this->deg;
  }

  //Dés : 2D6 + 9
  function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(2,$deg,9);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }
}

 ?>
