<?php
namespace Controller;
use \Controller\Controller;
use \Model\AvatarModel;
use \Model\UserModel;
use \Model\CharactersModel;
use \Model\InventoryModel;
use \Services\Validation;

class GameController extends Controller{

  public function fight() {
    //récupération des infos de l'utilisateur connecté
    $loggedUser = $this->getUser();
    $testModel = new AvatarModel();
    $testModel1 = new CharactersModel();
    $test1 = $testModel-> getUserWithAvatar($loggedUser['avatar_id']);
    $test2 = $testModel1-> find($loggedUser['id']);
    $this->show('game/fight', ['img_path'=> $test1['img_path']]);
  }

  public function intro() {
    $this->show('game/intro');
  }

  public function character_creation() {
    $this->show('game/character_creation');
  }

  public function character_creation_post()
  {
    // sur la validation du formulaire de mise à jour des infos utilisateur
    if(!empty($_POST['submituser'])) {
      $class = trim(strip_tags($_POST['class']));
      $gender = trim(strip_tags($_POST['gender']));
      $valid = new Validation();
      $error = array();
      // Verification class
      if (!empty($class)){
     } else {
       $error['class'] = 'Veuillez renseigner la classe';
     }
      // Verification gender
      if (isset($gender)){
     } else {
       $error['gender'] = 'Veuillez renseigner le sexe';
     }
      // Vérification name
      $result = $valid->validateText($_POST['name'], 3, 50);
      if (!empty($result)) {$error['name'] = $result;}
      // si aucune erreur
      if (count($error) == 0) {
        $loggedUser = $this->getUser();
        // met à jour l'utilisateur avec les nouvelles infos inserer
        $testModel = new CharactersModel();
        $testModel1 = new InventoryModel();
        if ($class == 'psy') {
          $testModel->insert(array(
                    'user_id' => $loggedUser['id'],
                    'class' => $class,
                    'name' => $_POST['name'],
                    'health' => 6,
                    'energy' => 20,
                    'armor' => 13,
                    'lvl' => 1,
                    'attack' => 1,
                    'strength' => 10,
                    'dexterity' => 12,
                    'spirit' => 18,
                    'social' => 14,
                    'lvl_spell' => 1,
                    'exp' => 0,
                    'gender' => $gender,
                )
            );
        $test = $testModel->findWithUserId($loggedUser['id']);
        $testModel1->insert(array(
                    'character_id' => $test['user_id'],
                    'object_id' => 2,
                    'amount' => 1
                  )
                );

        $test = $testModel->findWithUserId($loggedUser['id']);
        $testModel1->insert(array(
                            'character_id' => $test['user_id'],
                            'object_id' => 5,
                            'amount' => 1
                          )
                        );

          $test = $testModel->findWithUserId($loggedUser['id']);
          $testModel1->insert(array(
                                    'character_id' => $test['user_id'],
                                    'object_id' => 16,
                                    'amount' => 2
                                  )
                                );
        }

        if ($class == 'ranger') {
          $testModel->insert(array(
                    'user_id' => $loggedUser['id'],
                    'class' => $class,
                    'name' => $_POST['name'],
                    'health' => 7,
                    'energy' => 11,
                    'armor' => 18,
                    'lvl' => 1,
                    'attack' => 1,
                    'strength' => 12,
                    'dexterity' => 18,
                    'spirit' => 12,
                    'social' => 12,
                    'lvl_spell' => 1,
                    'exp' => 0,
                    'gender' => $gender,
                )
            );

            $test = $testModel->findWithUserId($loggedUser['id']);
            $testModel1->insert(array(
                        'character_id' => $test['user_id'],
                        'object_id' => 2,
                        'amount' => 1,
                      )
                    );

            $test = $testModel->findWithUserId($loggedUser['id']);
            $testModel1->insert(array(
                        'character_id' => $test['user_id'],
                        'object_id' => 6,
                        'amount' => 1,
                      )
                    );

            $test = $testModel->findWithUserId($loggedUser['id']);
            $testModel1->insert(array(
                        'character_id' => $test['user_id'],
                        'object_id' => 16,
                        'amount' => 2,
                      )
                    );
        }

        if ($class == 'soldier') {
          $testModel->insert(array(
                    'user_id' => $loggedUser['id'],
                    'class' => $class,
                    'name' => $_POST['name'],
                    'health' => 10,
                    'energy' => 8,
                    'armor' => 18,
                    'lvl' => 1,
                    'attack' => 1,
                    'strength' => 18,
                    'dexterity' => 14,
                    'spirit' => 10,
                    'social' => 10,
                    'lvl_spell' => 1,
                    'exp' => 0,
                    'gender' => $gender,
                )
            );

            $test = $testModel->findWithUserId($loggedUser['id']);
            $testModel1->insert(array(
                        'character_id' => $test['user_id'],
                        'object_id' => 1,
                        'amount' => 1,
                      )
                    );

            $test = $testModel->findWithUserId($loggedUser['id']);
            $testModel1->insert(array(
                        'character_id' => $test['user_id'],
                        'object_id' => 5,
                        'amount' => 1,
                      )
                    );

            $test = $testModel->findWithUserId($loggedUser['id']);
            $testModel1->insert(array(
                        'character_id' => $test['user_id'],
                        'object_id' => 16,
                        'amount' => 2,
                      )
                    );
        }
          // affiche admin_user.php
          $this->redirectToRoute('default_home');
      } else {
        $this->show('game/character_creation', ['error' => $error
                                               ]);
      }
    }
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
