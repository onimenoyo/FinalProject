<?php
namespace classes;

class Boss extends Characters{
  protected $CA = 21;
  protected $life = 52;
  private $deg = 4; //Type de Dés
  private $bonusDeg = 1;
  private $nbDice = 2; //Nombre de dés

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

  // Retourne les dégats du boss
  public function get_deg(){
    return $this->deg;
  }

  //Dés : 2D4 + 1 de base
  //Dés : 1D8 + 12 Après évolution
  function attaque($cible, $deg){
    $cible->life = $cible->life - $this->diceRoll($this->nbDice,$deg,$this->bonusDeg);
    $pvRestant = $cible->life;
    return $pvRestant;
  }

  //la fonction evolution modifie completement les stats du boss
  function evolution(){
    $this->life = 102;
    $this->CA = 29;
    $this->deg = 8;
    $this->bonusDeg = 12;
    $this->nbDice = 1;
  }
}


 ?>
