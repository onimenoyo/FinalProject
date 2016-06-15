<?php
namespace Utilities;
class Dices{

  public function diceRoll($nb = 1, $dice){
    $result = 0;
    for($i=0; $i < $nb; $i++){
      echo $dices = mt_rand(1, $dice);
      echo'<br>';
      $result = $result + $dices;
    }
    return $result;
  }


}


 ?>
