<?php

class Player extends Characters{

  // Pour définir la vie du joueur
  public function set_life($life){
    $this->lifeMax = $life;
    $this->life = $life;
  }

  // Pour définir la force du joueur
  public function set_strength($strength){
    $this->strength = $strength;
    $playerLife = $this->strength + 6;
    echo $playerLife;
    $this->set_life($playerLife);
  }

  // Pour définir la Dextirité du joueur
  public function set_dextirity($dextirity){
    $this->dextirity = $dextirity;
  }

  // Pour définir l'esprit du joueur
  public function set_spirit($spirit){
    $this->spiritMax = $spirit;
  }

  // Retourne la Classe D'Armure du joueur
  public function get_CA_player($bonusCA = 0){
    $CA = 10 + $this->get_bonus('dextirity') + $bonusCA;
    return $CA;
  }

  //Retourne les dégats du joueur en fonction de son arme et de sa force
  public function get_degats($degArmes, $tailleArme){
    $degats = $this->diceRoll(1,$degArmes) + $this->get_bonus('strength') * $tailleArme;
    return $degats;
  }

  public function attaque($cible, $degats){
    $cible->life = $cible->life - $degats;
  }

}

 ?>
