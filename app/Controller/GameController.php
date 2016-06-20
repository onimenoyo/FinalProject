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

  public function camp(){
  $this->show('game/camp');
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


    // afficher la page explore en fonction du lieu :
    public function explore($lieu) {
      $this->show('game/explore', ['lieu' => $lieu]);
    }

    // fonction d'exploration qui va générer ce qui va arriver :
    public function exploration($lieu){
        $acte ="";

      $valid = new Validation();
          // on lance un résultat aléatoire :
          $random = rand (1, 20);
          // si on est <= 5 alors on ne trouve rien
          if ($random <= 5){
            $adresse = 'explore';
            $type = [];
            echo 'Après avoir tourné pendant des heures, tu te rends compte que tu es retourné sur tes pas';

          // si on se trouve entre 6 et 10 alors on rencontre un ennemi en fonction du lieu :
          }elseif($random >= 6 && $random <= 10){
            $adresse = 'fight';
            if($lieu = 'Ruines'){
                $rand = rand(1, 10);

                if($rand >= 1 && $rand <=4){
                  $type = ['cible' => 'Drone'];

                }elseif($rand >=5 && $rand <= 7){
                  $type = ['cible' => 'Traqueur'];

                }elseif($rand >=8 && $rand < 10 ){
                  $type = ['cible' => 'FantassinAlien'];

                }elseif($rand == 10){
                  $type = ['cible' => 'Robot'];
                }

            }elseif($lieu = 'Abords'){
                $rand = rand(1, 10);

                if($rand >= 1 && $rand <=3){
                  $type = ['cible' => 'Drone'];

                }elseif($rand >=4 && $rand <= 7){
                  $type = ['cible' => 'Traqueur'];

                }elseif($rand >=8 && $rand < 10 ){
                  $type = ['cible' => 'FantassinAlien'];

                }elseif($rand == 10){
                  $type = ['cible' => 'Renegat'];
                }

            }elseif($lieu = 'Foret'){
                  $rand = rand(1, 10);

                if($rand >= 1 && $rand <=4){
                  $type = ['cible' => 'Traqueur'];

                }elseif($rand >=5 && $rand <= 8){
                  $type = ['cible' => 'FantassinAlien'];

                }elseif($rand >= 9){
                  $type = ['cible' => 'Renegat'];
                }

            }elseif($lieu = 'Lac' || $lieu ='Montagne'){
                $rand = rand(1,10);

                if($rand >=1 && $rand <= 5){
                  $type = ['cible' => 'FantassinAlien'];

                }elseif($rand >=6 && $rand <= 9){
                  $type = ['cible' => 'Renegat'];

                }elseif($rand == 10){
                  $type = ['cible' => 'Ravageur'];
                }

            }elseif($lieu = 'Base Alien'){
                  $rand = rand(1,10);

                  if($rand >=1 && $rand <= 5){
                    $type = ['cible' => 'Drone'];

                  }elseif($rand >=6 && $rand <= 9){
                    $type = ['cible' => 'FantassinAlien'];

                  }elseif($rand == 10){
                    $type = ['cible' => 'Ravageur'];
                  }
            }

          // si l'on se trouve au dessus de 10 alors on découvre une zone d'exploration
          }elseif($random >= 11 && $random <= 15) {
            $adresse = 'explore';

            if($lieu = 'Ruines'){
                $rand = rand(1,2);

                if($rand == 1){
                  $type = ['lieu' => 'Centre Commercial'];

                }elseif($rand == 2){
                  $type = ['lieu' => 'Gare'];
                }

            }elseif ($lieu = 'Abords') {
                $rand = rand(1,3);

                if($rand == 1){
                  $type = ['lieu' => 'Pont'];

                }elseif($rand == 2){
                  $type = ['lieu' => 'Aeroport'];

                }elseif($rand == 3){
                  $type = ['lieu' => 'Frontière'];
                }

            }elseif ($lieu = 'Foret') {
                $rand = rand(1,2);

                if($rand == 1){
                  $type = ['lieu' => 'Camp Survivants'];

                }elseif($rand == 2){
                  $type = ['lieu' => 'Bosquet'];
                }

            }elseif ($lieu = 'Lac') {
                $rand = rand(1,2);

                if($rand == 1){
                  $type = ['lieu' => 'Chateau Antique'];

                }elseif($rand == 2){
                  $type = ['lieu' => 'Porte Montagnes'];
                }

            }elseif ($lieu = 'Montagne') {
                $rand = rand(1,2);

                if($rand == 1){
                  $type = ['lieu' => 'Vieux Temple'];

                }elseif($rand == 2){
                  $type = ['lieu' => 'Caverne'];
                }

            }elseif ($lieu = 'Base Alien') {
                $type = ['lieu' => 'Entrée Secrète'];
            }

            //si l'on est au dessus de 15, on ouvre l'accès à la zone suivante :
          }elseif ($random >= 16){
              $adresse = 'explore';
              if($lieu = 'Ruines'){
                $type = ['lieu' => 'Abords'];
              }elseif ($lieu = 'Abords') {
                $type = ['lieu' => 'Foret'];
              }elseif ($lieu = 'Foret') {
                $type = ['lieu' => 'Lac'];
              }elseif ($lieu = 'Lac') {
                $type = ['lieu' => 'Montagne'];
              }elseif ($lieu = 'Montagne') {
                $type = ['lieu' => 'Base Alien'];
              }elseif ($lieu = 'Base Alien') {
                $type = ['lieu' => 'Reacteur'];
              }
          }
          debug($type);
          // $adresse = '/game/' . $adresse.'/';
          debug($adresse);
          // genere l'URL en fonction des tirages :
          $acte = $this->generateUrl($adresse, $type);
          $this->redirect($acte);
          // $this->url('game/'.$acte);

    }


    public function attack($cible, $deg){
      $valid = new Validation();
      // verification ajax :
        if ($valid->isAjax()){
          $data = array(
            'cible' => $cible,
            'degats' => $deg,
          );
          $this->showJson($data);
          //si ce n'est pas de l'ajax :
        } else{
          $this->showNotFound();

        }

      }





}
