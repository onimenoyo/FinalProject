<?php
namespace Controller;
use \Controller\Controller;




class GameController extends Controller{

  public function fight() {

    $this->show('game/fight');
  }



/*
  public function attack(){
    // verification ajax :
    if ( ->isAjax()){


      $this->showJson($data);
      //si ce n'est pas de l'ajax :
    } else{

      $this->showNotFound;

    }

*/

}
