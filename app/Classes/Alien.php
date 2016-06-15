<?php
namespace classes;

class Alien extends Characters{
  protected $CA = 17;
  protected $life = 20;

  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée et définit ses PV en fonction de son lvl
  public function __construct($name){
    $this->name = $name;
    $this->set_lvl();
  }
  function set_lvl($lvl = 1){
    $this->lvl = $lvl;
    $this->set_life();
    return $lvl;
  }
  function set_life(){
    $this->life = $this->life * $this->lvl;
  }

  function set_newLife($life){
    $this->life = $life;
  }

  //Dés : 1D8 + 2
  function attaque($cible){
    $cible->life = $cible->life - $this->diceRoll(1,8,2);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }
}


 ?>
