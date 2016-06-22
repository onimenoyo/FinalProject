<?php
namespace classes;

class Robot extends Characters{
  protected $CA = 16;
  protected $life = 84;
  protected $lifeMax = 84;
  Private $deg = 6; //Type de dés

  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée et définit ses PV en fonction de son lvl
  public function __construct($name){
    $this->name = $name;
    $this->set_lvl();
  }
  //Définit le lvl du monstre qui définit la vie en fonction de son lvl
  function set_lvl($lvl = 1){
    $this->lvl = $lvl;
    $this->set_life();
    $this->set_lifeMax();
    return $lvl;
  }
  function set_life(){
    $this->life = $this->life * $this->lvl;
  }

  //Dés : 1D6 + 6
  function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll(1,$deg,6);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }
}

 ?>
