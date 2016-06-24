<?php
namespace Controller;
use \Controller\Controller;
use \Model\AvatarModel;
use \Model\UserModel;
use \Model\CharactersModel;
use \Model\InventoryModel;
use \Model\ObjectsModel;
use \Model\PnjModel;
use \Services\Validation;
use \Classes\Characters;
use \Classes\Drone;
use \Classes\FantassinAlien;
use \Classes\Player;
use \Classes\Renegat;
use \Classes\Ravageur;
use \Classes\Robot;
use \Classes\Traqueur;



class GameController extends Controller{

  public function intro() {
    $this->show('game/intro');
  }

  public function intro2() {
    $this->show('game/intro2');
  }

  public function intro3($id) {
    $this->show('game/intro3', ['id' => $id]);
  }

  public function camp($id){
  $this->show('game/camp', ['id' => $id] );
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
          $characters = new CharactersModel();
          $inventory = new InventoryModel();
          //si le joueur prend la classe psy
          if ($class == 'psy') {
            $characters->insert(array(
                      'user_id' => $loggedUser['id'],
                      'class' => $class,
                      'name' => $_POST['name'],
                      'health' => 6,
                      'current_health' => 6,
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
                      'weapon_id' => 2,
                      'gold' => 20,
                  )
              );
          // injection équipement de départ
          $character = $characters->findWithUserId($loggedUser['id']);
          $inventory->insert(array(
                      'character_id' => $character['id'],
                      'object_id' => 2,
                      'amount' => 1
                    )
                  );

          $character = $characters->findWithUserId($loggedUser['id']);
          $inventory->insert(array(
                              'character_id' => $character['id'],
                              'object_id' => 5,
                              'amount' => 1
                            )
                          );

            $character = $characters->findWithUserId($loggedUser['id']);
            $inventory->insert(array(
                                      'character_id' => $character['id'],
                                      'object_id' => 16,
                                      'amount' => 2
                                    )
                                  );
          }

          // si le joueur prend la classe ranger
          if ($class == 'ranger') {
            $characters->insert(array(
                      'user_id' => $loggedUser['id'],
                      'class' => $class,
                      'name' => $_POST['name'],
                      'health' => 7,
                      'current_health' => 7,
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
                      'weapon_id' => 6,
                      'gold' => 20,
                  )
              );

              // injection équipement de départ
              $character = $characters->findWithUserId($loggedUser['id']);
              $inventory->insert(array(
                          'character_id' => $character['id'],
                          'object_id' => 2,
                          'amount' => 1,
                        )
                      );

              $character = $characters->findWithUserId($loggedUser['id']);
              $inventory->insert(array(
                          'character_id' => $character['id'],
                          'object_id' => 6,
                          'amount' => 1,
                        )
                      );

              $character = $characters->findWithUserId($loggedUser['id']);
              $inventory->insert(array(
                          'character_id' => $character['id'],
                          'object_id' => 16,
                          'amount' => 2,
                        )
                      );
          }

          // si le joueur prend la classe soldier
          if ($class == 'soldier') {
            $characters->insert(array(
                      'user_id' => $loggedUser['id'],
                      'class' => $class,
                      'name' => $_POST['name'],
                      'health' => 10,
                      'current_health' => 10,
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
                      'weapon_id' => 1,
                      'gold' => 20,
                  )
              );

              // injection équipement de départ
              $character = $characters->findWithUserId($loggedUser['id']);
              $inventory->insert(array(
                          'character_id' => $character['id'],
                          'object_id' => 1,
                          'amount' => 1,
                        )
                      );

              $character = $characters->findWithUserId($loggedUser['id']);
              $inventory->insert(array(
                          'character_id' => $character['id'],
                          'object_id' => 5,
                          'amount' => 1,
                        )
                      );

              $character = $characters->findWithUserId($loggedUser['id']);
              $inventory->insert(array(
                          'character_id' => $character['id'],
                          'object_id' => 16,
                          'amount' => 2,
                        )
                      );
          }
            // affiche admin_user.php
            $this->redirectToRoute('intro3', ['id' => $character['id'] ]);
        } else {
          $this->show('game/intro2', ['error' => $error
                                                 ]);
        }
      }
    }

    public function equip($equip, $id, $lieu, $cible, $pvcible, $pvjoueur) {
          //récupération des infos de l'utilisateur connecté
          $loggedUser = $this->getUser();
          $avatars = new AvatarModel();
          $characters = new CharactersModel();
          $inventories = new InventoryModel();
          $objects = new ObjectsModel();
          $drone = new Drone('Drone');
          $fantassinAlien = new FantassinAlien('FantassinAlien');
          $ravageur = new Ravageur('Ravageur');
          $renegat = new Renegat('Renegat');
          $robot = new Robot('Robot');
          $traqueur = new Traqueur('Traqueur');

          $character = $characters->find($id);
          $object = $objects->find($equip);
          if ($object['wearable'] == 1 ) {
            $characters->update(array(
                        'weapon_id' => $equip,
              ), $character['id']
            );
          }

          if ($cible == 'Drone'){$target = new Drone('Drone');  }
          elseif ($cible == 'FantassinAlien'){ $target = new FantassinAlien('FantassinAlien'); }
          elseif ($cible == 'Ravageur'){ $target = new Ravageur('Ravageur'); }
          elseif ($cible == 'Renegat'){ $target = new Renegat('Renegat'); }
          elseif ($cible == 'Robot'){ $target = new Robot('Robot'); }
          elseif ($cible == 'Traqueur'){ $target = new Traqueur('Traqueur'); }
          // on place dans un array les informations de l'ennemi
          $ennemi = array('name' => $target->get_name(),
                          'current_health' => $target->get_life(),
                          'health' => $target->get_lifeMax(),
                          'armor' => $target->get_CA(),
                          );
        // on place dans un array les informations du joueur
        $joueur = array('name' => $target->get_name(),
                          'current_health' => $character['health'],
                          'health' => $character['health'],
                          'lvl' => $character['lvl'],
                          'strength' => $character['strength'],
                          'armor' => $character['armor'],
                          'dexterity' => $character['dexterity'],
                          );
        $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
        $character = $characters-> find($id);
        $inventory = $inventories-> findAllWithId($id);
        foreach ($inventory as $object) {
          $item[] = $objects->find($object['object_id']);
        }
        $this->show('game/fight', ["pvcible" => $pvcible,
                                   "pvjoueur" => $pvjoueur,
                                   'id' => $id,
                                   'lieu' => $lieu,
                                   'cible' => $cible,
                                   'avatar' => $avatar,
                                   'objects' => $item ,
                                   'character' => $character,
                                   'ennemi' => $ennemi,
                                   'joueur' => $joueur,
                                   'inventory' => $inventory]);
  }


    // afficher la page explore en fonction du lieu :
    public function explore($id, $lieu) {
      $this->show('game/explore', ['id' => $id, 'lieu' => $lieu]);
    }

    // fonction d'exploration qui va générer ce qui va arriver :
    public function exploration($id, $lieu){
      $acte ="";

      $valid = new Validation();
          // on lance un résultat aléatoire :
          $random = rand (1, 20);

          // si on se trouve entre 6 et 10 alors on rencontre un ennemi en fonction du lieu :

          if($random <= 7){
            $adresse = 'fight';

            if($lieu == 'Ruines' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien'){
                $rand = rand(1, 10);
                $type = ['id' => $id, 'lieu' => $lieu];

                if($rand >= 1 && $rand <=4){
                  $type['cible'] = 'Drone';

                }elseif($rand >=5 && $rand <= 7){
                  $type['cible'] = 'Traqueur';

                }elseif($rand >=8 && $rand < 10 ){
                  $type['cible'] = 'FantassinAlien';

                }elseif($rand == 10){
                  $type['cible'] = 'Robot';
                }

            }elseif($lieu == 'Abords' && $lieu != 'Ruines' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien'){
                $rand = rand(1, 10);
                $type = ['id' => $id, 'lieu' => $lieu];

                if($rand >= 1 && $rand <=3){
                  $type['cible'] = 'Drone';

                }elseif($rand >=4 && $rand <= 7){
                  $type['cible'] = 'Traqueur';

                }elseif($rand >=8 && $rand < 10 ){
                  $type['cible'] = 'FantassinAlien';

                }elseif($rand == 10){
                  $type['cible'] = 'Renegat';
                }

            }elseif($lieu == 'Foret' && $lieu != 'Abords' && $lieu != 'Ruines' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien'){
                $rand = rand(1, 10);
                $type = ['id' => $id, 'lieu' => $lieu];

                if($rand >= 1 && $rand <=4){
                  $type['cible'] = 'Traqueur';

                }elseif($rand >=5 && $rand <= 8){
                  $type['cible'] = 'FantassinAlien';

                }elseif($rand >= 9){
                  $type['cible'] = 'Renegat';
                }

            }elseif($lieu == 'Lac' || $lieu == 'Montagne' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Base_Alien'){
                $rand = rand(1,10);
                $type = ['id' => $id, 'lieu' => $lieu];

                if($rand >=1 && $rand <= 5){
                  $type['cible'] = 'FantassinAlien';

                }elseif($rand >=6 && $rand <= 9){
                  $type['cible'] = 'Renegat';

                }elseif($rand == 10){
                  $type['cible'] = 'Ravageur';
                }

            }elseif($lieu == 'Base_Alien' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Ruines'){
                  $rand = rand(1,10);
                  $type = ['id' => $id, 'lieu' => $lieu];

                  if($rand >=1 && $rand <= 5){
                    $type['cible'] = 'Drone';

                  }elseif($rand >=6 && $rand <= 9){
                    $type['cible'] = 'FantassinAlien';

                  }elseif($rand == 10){
                    $type['cible'] = 'Ravageur';
                  }
            }

          // si l'on se trouve au dessus de 10 alors on découvre une zone d'exploration
          }elseif($random >= 8 && $random <= 15) {
            $adresse = 'explore';
            $type = ['id' => $id];

            if($lieu == 'Ruines' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien'){
                $rand = rand(1,3);

                if($rand == 1){
                  $type['lieu'] = 'Centre_Commercial';

                }elseif($rand == 2){
                  $type['lieu'] = 'Gare';

                }elseif($rand == 3){
                  $type['lieu'] = 'Musee';
                }

            }elseif ($lieu == 'Abords' && $lieu != 'Ruines' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien') {
                $rand = rand(1,3);

                if($rand == 1){
                  $type['lieu'] = 'Pont';

                }elseif($rand == 2){
                  $type['lieu'] = 'Aeroport';

                }elseif($rand == 3){
                  $type['lieu'] = 'Frontiere';
                }

            }elseif ($lieu == 'Foret' && $lieu != 'Abords' && $lieu != 'Ruines' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien') {
                $rand = rand(1,2);

                if($rand == 1){
                  $type['lieu'] = 'Camp_Survivants';

                }elseif($rand == 2){
                  $type['lieu'] = 'Bosquet';
                }

            }elseif ($lieu == 'Lac' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Ruines' && $lieu != 'Montagne' && $lieu != 'Base_Alien') {
                $rand = rand(1,2);

                if($rand == 1){
                  $type['lieu'] = 'Chateau_Antique';

                }elseif($rand == 2){
                  $type['lieu'] = 'Porte_Montagnes';
                }

            }elseif ($lieu == 'Montagne' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Ruines' && $lieu != 'Base_Alien') {
                $rand = rand(1,2);

                if($rand == 1){
                  $type['lieu'] = 'Vieux_Temple';

                }elseif($rand == 2){
                  $type['lieu'] = 'Caverne';
                }

            }elseif ($lieu == 'Base_Alien' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Ruines') {
                $type['lieu'] = 'Entree_Secrete';
            }

            //si l'on est au dessus de 15, on ouvre l'accès à la zone suivante :
          }elseif ($random >= 16){
              $adresse = 'explore';
              $type = ['id' => $id];

              if($lieu == 'Ruines' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien'){
                $type['lieu'] = 'Abords';
              }elseif ($lieu == 'Abords' && $lieu != 'Ruines' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien') {
                $type['lieu'] = 'Foret';
              }elseif ($lieu == 'Foret' && $lieu != 'Abords' && $lieu != 'Ruines' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Base_Alien') {
                $type['lieu'] = 'Lac';
              }elseif ($lieu == 'Lac' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Ruines' && $lieu != 'Montagne' && $lieu != 'Base_Alien') {
                $type['lieu'] = 'Montagne';
              }elseif ($lieu == 'Montagne' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Ruines' && $lieu != 'Base_Alien') {
                $type['lieu'] = 'Base_Alien';
              }elseif ($lieu == 'Base_Alien' && $lieu != 'Abords' && $lieu != 'Foret' && $lieu != 'Lac' && $lieu != 'Montagne' && $lieu != 'Ruines') {
                $type['lieu'] = 'Entree_Secrete';
              }
          }

          // genere l'URL en fonction des tirages :
          $acte = $this->generateUrl($adresse, $type);
          $this->redirect($acte);

    }

    public function fight($id, $lieu, $cible) {
      //récupération des infos de l'utilisateur connecté
      $loggedUser = $this->getUser();
      $avatars = new AvatarModel();
      $characters = new CharactersModel();
      $inventories = new InventoryModel();
      $objects = new ObjectsModel();

      // instance de la classe du monstre en fonction de la cible
      if ($cible == 'Drone'){$target = new Drone('Drone');  }
      elseif ($cible == 'FantassinAlien'){ $target = new FantassinAlien('FantassinAlien'); }
      elseif ($cible == 'Ravageur'){ $target = new Ravageur('Ravageur'); }
      elseif ($cible == 'Renegat'){ $target = new Renegat('Renegat'); }
      elseif ($cible == 'Robot'){ $target = new Robot('Robot'); }
      elseif ($cible == 'Traqueur'){ $target = new Traqueur('Traqueur'); }
      $pvcible = $target->get_life();
      $char = new CharactersModel();
      $character = $char->find($id);
      $player = new Player($character['name']);
      $player->set_life($character['health']);
      $pvjoueur = $player->get_life();

      // on place dans un array les informations de l'ennemi
      $ennemi = array('name' => $target->get_name(),
                      'current_health' => $target->get_life(),
                      'health' => $target->get_lifeMax(),
                      'armor' => $target->get_CA(),
                      );

      // on place dans un array les informations du joueur
      $joueur = array('name' => $target->get_name(),
                      'current_health' => $character['health'],
                      'health' => $character['health'],
                      'lvl' => $character['lvl'],
                      'strength' => $character['strength'],
                      'armor' => $character['armor'],
                      'dexterity' => $character['dexterity'],
                    );
      $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
      $character = $characters-> find($id);
      $inventory = $inventories-> findAllWithId($id);
      foreach ($inventory as $object) {
        $item[] = $objects->find($object['object_id']);
      }
      $this->show('game/fight', ['id' => $id, 'lieu' => $lieu, 'cible' => $cible, 'avatar' => $avatar, 'objects' => $item , 'character' => $character, 'joueur'=> $joueur, 'ennemi' => $ennemi, 'inventory' => $inventory, 'pvcible' => $pvcible, 'pvjoueur' => $pvjoueur]);
    }



    public function attack($id, $lieu, $cible, $pvcible, $pvjoueur){
      $characters = new CharactersModel();
      $inventories = new InventoryModel();
      $objects = new ObjectsModel();
      $char = new CharactersModel();
      $monster = new PnjModel();

        // appel de la classe du monstre en fonction de la cible
        if ($cible == 'Drone'){ $target = new Drone('Drone'); }
        elseif ($cible == 'FantassinAlien'){ $target = new FantassinAlien('FantassinAlien'); }
        elseif ($cible == 'Ravageur'){ $target = new Ravageur('Ravageur'); }
        elseif ($cible == 'Renegat'){ $target = new Renegat('Renegat'); }
        elseif ($cible == 'Robot'){ $target = new Robot('Robot'); }
        elseif ($cible == 'Traqueur'){ $target = new Traqueur('Traqueur'); }

        $targetName = $target->get_name();

        // appel des informations du personnage
        $character = $char->find($id);
        $player = new Player($character['name']);
        $target->set_newLife($pvcible);
        $player->set_strength($character['strength']);
        $player->set_dexterity($character['dexterity']);
        $player->set_spirit($character['spirit']);
        $player->set_life($pvjoueur);
        $player->set_CA($character['armor']);


        // on récupère les infos de l'arme du personnage
        $arme = new ObjectsModel();
        $weapon = $arme->find($character['weapon_id']);
        $ancienpvcible = $pvcible;
        $ancienpvjoueur = $pvjoueur;

        //  attaque du joueur  :
          $pvcible = $player->touch_cac($target, $weapon['dice'], $weapon['damage']);
          if (!$pvcible){
            $playerTouch = $player->get_name(). ' rate son attaque.';
            $pvcible = $ancienpvcible;
          }else {
            $playerTouch = $player->get_name(). ' touche ' .$target->get_name();
          }
          // si l'ennemi est mort :
          if($target->is_dead()){
            $playerTouch = $target->get_name() . ' est mort !<br> ' ;

            // ajout xp :
            // récupérer l'exp du monstre dans sa table et l'injecter dans celle du joueur

          }

          // attaque de l'ennemi
          $pvjoueur = $target->touch_cac($player,1, $target->get_deg());
          if(!$target->is_dead()){
            if (!$pvjoueur){
              $targetTouch = $target->get_name(). ' rate son attaque.';
              $pvjoueur = $ancienpvjoueur;
            }else {
              $targetTouch = $target->get_name(). ' touche ' .$player->get_name();
            }
          }else{
            $targetTouch = '';
          }
          // si le joueur est mort :
          if($player->is_dead()){
            echo $player->get_name() . ' est mort ! <br> Vous Avez Perdu ! <br>';
            die();
          }

          $ennemi = array('name' => $target->get_name(),
          'current_health' => $pvcible,
          'health' => $target->get_lifeMax(),
          'armor' => $target->get_CA(),
          'touch' => $targetTouch,
        );

        $joueur = array('name' => $target->get_name(),
        'current_health' => $pvjoueur,
        'health' => $character['health'],
        'lvl' => $character['lvl'],
        'strength' => $character['strength'],
        'armor' => $character['armor'],
        'dexterity' => $character['dexterity'],
        'touch' => $playerTouch,

      );
          $loggedUser = $this->getUser();
          $avatars = new AvatarModel();
          $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
          $character = $characters-> find($id);
          $inventory = $inventories-> findAllWithId($id);
          foreach ($inventory as $object) {
            $item[] = $objects->find($object['object_id']);
          }

        $this->show('game/fight', ['id' => $id, 'lieu' => $lieu, 'cible' => $cible, 'avatar' => $avatar, 'objects' => $item , 'character' => $character, 'ennemi' => $ennemi, 'joueur' => $joueur, 'inventory' => $inventory, 'pvcible' => $pvcible, 'pvjoueur' => $pvjoueur]);
      }


}
