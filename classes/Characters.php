<?php

class Characters extends Utilities\Dices{

  // use Dices;
  // public $dice = new Dices();

  protected $lifeMax = 100;
  protected $life = 100;
  protected $strength = 20;
  protected $dextirity = 20;
  protected $spiritMax = 100;
  protected $spirit = 100;
  protected $name;
  protected $lvl = 1;
  protected $CA = 20;

  //Fonction __construct est une fonction d'origine qui permet de définir directement quand on crée.
  public function __construct($name){
    $this->name = $name;
  }

//Fonction Jet de Dés $nb = nombre de dés  et $dice le type de dés (d4, d6, d8, etc...)
public function diceRoll($nb = 1, $dice, $bonus = 0){
  $result = 0;
  for($i=0; $i < $nb; $i++){
    $dices = mt_rand(1, $dice) + $bonus;
    $result = $result + $dices;
  }
  return $result;
}

// Retourne l'initiative du personnage
public function initiative(){
  $initiative = $this->diceRoll(1,20,0) + $this->get_bonus('dextirity');
  return $initiative;
}

//Retourne Si le personnage touche la cible au CàC
public function touch_cac($cible){
  $d20 = $this->diceRoll(1,20,0);
  if ($d20 == 20){
    return True;
  }else{
    $touch = $d20 + $this->get_bonus_atkCaC();
    if($touch > $cible->get_CA()){
      return True;
    }else{
      return false;
    }
  }
}

//Retourne Si le personnage touche la cible à distance
public function touch_distance($cible){
  $touch = $this->diceRoll(1,20,0) + $this->get_bonus_atkDistance();
  return $touch;
}

//Retourne le nom
public function get_name(){
  return $this->name;
}

// Retourne Vrai ou Faux en fonction de la life du personnage
public function dead(){
return $this->life <= 0; // si la life est inférieur ou égale à 0 il retournera TRUE
}

// Met la life au max si la régèneration fait dépasser la life max du personnage
protected function life_Max(){
  if($this->life >= $this->lifeMax){
  $this->life = $this->lifeMax;
  }
  return $this->life;
}

//Permet de régénérer le personnage, avec en paramètre le nombre de PV qu'il récupère
public function regenerateLife($life){
  $this->life += $life;
  $this->life_Max(); //vérifie que la life ne dépasse pas la life max
}

//Retourne la vie
public function get_life(){
  return $this->life;
}

// Met la spirit au max si la régèneration fait dépasser la spirit max du personnage
protected function spiritMax($spiritMax){
  if($this->spirit >= $spiritmax){
  $this->spirit = $spiritMax;
  }
  return $this->spirit <= 0; // si la spirit est inférieur ou égale à 0 il retournera TRUE
}

//Permet de régénérer le personnage, avec en paramètre le nombre de PV qu'il récupère
public function regenerateSpirit($spirit, $spiritMax){
  $this->spirit += $spirit;
  $this->spiritMax($spiritMax); //vérifie que la spirit ne dépasse pas la spirit max
}


// Retourne la Classe D'Armure
public function get_CA(){
  return $this->CA;
}

// Retourne les bonus de 'strength', 'dextirity' et 'spirit'
public function get_bonus($stat){
  $bonus = floor(($this->$stat-10)/2); //arrondi a l'entier inférieur
  return $bonus;
}

// Retourne le bonus d'attaque au Corps à Corps
public function get_bonus_atkCaC(){
  $bonusAtkCaC = $this->lvl + $this->get_bonus('strength');
  return $bonusAtkCaC;
}

// Retourne le bonus d'attaque à distance
public function get_bonus_atkDistance(){
  $bonusAtkDistance = $this->lvl + $this->get_bonus('dextirity');
  return $bonusAtkDistance;
}

// Retourne le bonus d'attaque magique
public function get_bonus_atkMagique(){
  $bonusAtkMagique = $this->lvl + $this->get_bonus('spiritMax');
  return $bonusAtkMagique;
}

}

 ?>
