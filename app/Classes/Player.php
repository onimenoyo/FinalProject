<?php
namespace classes;

class Player extends Characters{

  // Pour définir la vie du joueur
  public function set_life($life){
    $this->lifeMax = $life;
    $this->life = $life;
    return $life;
  }

  // Pour définir la force du joueur
  public function set_strength($strength){
    $this->strength = $strength;
    return $strength;
    // $playerLife = $this->strength + 6;
    // echo $playerLife;
    // $this->set_life($playerLife);
  }

  // Pour définir la Dextirité du joueur
  public function set_dexterity($dexterity){
    $this->dexterity = $dexterity;
    return $dexterity;
  }

  // Pour définir l'esprit du joueur
  public function set_spirit($spirit){
    $this->spiritMax = $spirit;
    return $spirit;
  }

  // Retourne la Classe D'Armure du joueur
  // public function get_CA_player($bonusCA = 0){
  //   $CA = 10 + $this->get_bonus('dexterity') + $bonusCA;
  //   return $CA;
  // }

  public function set_CA($CA){
    $this->CA = $CA;
    return $CA;
  }

  //Retourne les dégats du joueur en fonction de son arme et de sa force
  public function get_degats($degArmes, $tailleArme){
    return $degats;
  }

  public function attaque($cible, $dice, $degArmes){
    $degats = $this->diceRoll($dice, $degArmes,0);
    $newLife = $cible->get_life() - $degats;
    $cible->set_newLife($newLife);
    // $ennemi['current_health'] = $cible->get_life();
    return  $cible->get_life();
  }

}

 ?>
