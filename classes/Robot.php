<?php
class Robot extends Characters{

  protected $CA = 16;
  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée et définit ses PV en fonction de son lvl
  public function __construct($name){
    $this->name = $name;
    $this->set_lvl();
  }
  //Définit le lvl du monstre qui définit la vie en fonction de son lvl
  function set_lvl($lvl = 1){
    $this->lvl = $lvl;
    $this->set_life();
    return $lvl;
  }
  function set_life(){
    $this->life = 84 * $this->lvl;
  }

  //Dés : 1D6 + 6
  function attaque($cible){
    $cible->life = $cible->life - $this->diceRoll(1,6,6);
    $pvRestant = 'Il reste ' . $cible->life . 'PV à ' . $cible->get_name();
    return $pvRestant;
  }
}

 ?>
