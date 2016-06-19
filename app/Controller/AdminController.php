<?php
namespace Controller;

use \Controller\Controller;
use \Services\Validation;
use \Model\AuthentificationModel;
use \Model\UserModel;
use \Model\NewsModel;
use \Model\CharactersModel;
use \Model\InventoryModel;
use \Model\ObjectsModel;
use \Model\PnjModel;
use \Model\StringUtils;

class AdminController extends Controller
{
  public function dashboard()
  {
    // affiche dashboard.php
    $this->show('admin/dashboard');
  }

  public function admin_user()
  {
    $testModel = new UserModel();
    $tests= $testModel->findAll();
    // affiche admin_user.php
    $this->show('admin/admin_user', ['users'=> $tests]);
  }

  public function admin_user_modif($id)
  {
    // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
    $testModel = new UserModel();
    $test= $testModel->find($id);
    $this->show('admin/modif_user', ['id'=> $id,
                                     'pseudo'=> $test['pseudo'],
                                     'firstname'=> $test['firstname'],
                                     'lastname'=> $test['lastname'],
                                     'email'=> $test['email']
                                   ]);
  }

  public function admin_user_modif_post($id)
  {
    // sur la validation du formulaire de mise à jour des infos utilisateur
    if(!empty($_POST['submituser'])) {
      $type = trim(strip_tags($_POST['role']));
      $valid = new Validation();
      $error = array();
      // Verification role
      if (!empty($_POST['role'])){
     } else {
       $error['role'] = 'Veuillez renseigner le role';
     }
      // Vérification pseudo
      $result = $valid->validateText($_POST['pseudo'], 3, 50);
      if (!empty($result)) {$error['pseudo'] = $result;}
      // Vérification firstname
      $result = $valid->validateText($_POST['firstname'], 3, 50);
      if (!empty($result)) {$error['firstname'] = $result;}
      // Vérification lastname
      $result = $valid->validateText($_POST['lastname'], 3, 50);
      if (!empty($result)) {$error['lastname'] = $result;}
      // Vérification mail
      $result = $valid->validateText($_POST['mail'], 3, 50);
      if (!empty($result)) {$error['mail'] = $result;}
      // On verifie que si l'email ou le pseudo est déja dans la base de donnée on ne l'accepte pas
      $testModel3 = new UserModel();
      $test3 = $testModel3->find($id);
      $testModel1 = new UserModel();
      $test1 = $testModel1->emailExists($_POST['mail']);
      if ($test3['email'] =! $_POST['mail'] ) {
        if ($test1) {$error['mail'] = "l'email existe déjà";}
      }
      $testModel2 = new UserModel();
      $test2 = $testModel2->usernameExists($_POST['pseudo']);
      if ($test3['pseudo'] =! $_POST['pseudo'] ) {
        if ($test2) {$error['pseudo'] = "le pseudo existe déjà";}
      }

      // si aucune erreur
      if (count($error) == 0) {
        // met à jour l'utilisateur avec les nouvelles infos inserer
        $testModel = new UserModel();
        $testModel->update(array(
                  'pseudo' => $_POST['pseudo'],
                  'firstname' => $_POST['firstname'],
                  'lastname' => $_POST['lastname'],
                  'email' => $_POST['mail'],
                  'last_connexion' => date('Y-m-d H:i:s'),
                  'role' => $_POST['role'],
                  'modified_at' => date('Y-m-d H:i:s'),
              ), $id
          );
          $testModel = new UserModel();
          $tests= $testModel->findAll();
          // affiche admin_user.php
          $this->show('admin/admin_user', ['users'=> $tests]);
      } else {
        $testModel = new UserModel();
        $test= $testModel->find($id);
        $this->show('admin/modif_user', ['error' => $error,
                                         'id'=> $id,
                                         'pseudo'=> $test['pseudo'],
                                         'firstname'=> $test['firstname'],
                                         'lastname'=> $test['lastname'],
                                         'email'=> $test['email']
                                       ]);
      }
    }
  }

  public function admin_user_delete($id) {
    $testModel1 = new UserModel();
    $testModel1->delete($id);
    $testModel = new UserModel();
    $tests= $testModel->findAll();
    // affiche admin_user.php
    $this->redirectToRoute('admin_user', ['users'=> $tests]);
  }

  public function admin_news() {
    $testModel = new NewsModel();
    $tests= $testModel->findAll();
    // affiche admin_news.php
    $this->show('admin/admin_news', ['news'=> $tests]);
  }

  public function admin_news_add() {
    $this->show('admin/admin_news_add');
  }

  public function admin_news_add_post() {
    $valid = new Validation();
    $error = array();
    // Vérification Title
    $result = $valid->validateText($_POST['title'], 3, 255);
    if (!empty($result)) {$error['title'] = $result;}
    // Vérification Content
    $result = $valid->validateText($_POST['content'], 3, 1000);
    if (!empty($result)) {$error['content'] = $result;}
    // Si il n'y a pas d'erreur
    if (count($error) == 0) {
        // récupération des infos utilisateur
        $loggedUser = $this->getUser();
        // insertion de la news dans la base de donnée
        $testModel = new NewsModel();
        $testModel->insert(array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $loggedUser['pseudo'],
            )
        );
        // rammène l'utilisateur a l'accueil
        $testModel = new NewsModel();
        $tests= $testModel->findAll();
        // affiche admin_news.php
        $this->redirectToRoute('admin_news', ['news'=> $tests]);
    } else {
      // récupère les erreurs et permet de les réutiliser dans register.php
      $this->show('admin/admin_news_add', ['error' => $error]);
    }
  }

  public function admin_news_delete($id) {
    $testModel1 = new NewsModel();
    $testModel1->delete($id);
    $testModel = new NewsModel();
    $tests= $testModel->findAll();
    // affiche admin_user.php
    $this->redirectToRoute('admin_news', ['news'=> $tests]);
  }

    public function admin_news_modif($id)
    {
      // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
      $testModel = new NewsModel();
      $test= $testModel->find($id);
      $this->show('admin/admin_news_modif', ['id'=> $id,
                                       'title'=> $test['title'],
                                       'content'=> $test['content'],
                                     ]);
    }

    public function admin_news_modif_post($id)
    {
        $valid = new Validation();
        $error = array();
        // Vérification title
        $result = $valid->validateText($_POST['title'], 3, 255);
        if (!empty($result)) {$error['title'] = $result;}
        // Vérification content
        $result = $valid->validateText($_POST['content'], 3, 1000);
        if (!empty($result)) {$error['content'] = $result;}
        // si aucune erreur
        if (count($error) == 0) {
          // met à jour l'utilisateur avec les nouvelles infos inserer
          $testModel = new NewsModel();
          // récupération des infos utilisateur
          $loggedUser = $this->getUser();
          $testModel->update(array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $loggedUser['pseudo'],
                ), $id
            );
            $testModel = new NewsModel();
            $tests= $testModel->findAll();
            // affiche admin_news.php
            $this->redirectToRoute('admin_news', ['news'=> $tests]);
        } else {
          $testModel = new NewsModel();
          $test= $testModel->find($id);
          $this->show('admin/admin_news_modif', ['error' => $error,
                                                 'id'=> $id,
                                                 'title'=> $test['title'],
                                                 'content'=> $test['content'],
                                                 ]);
        }
    }
    public function admin_characters() {
      $testModel = new CharactersModel();
      $tests= $testModel->findAll();
      // affiche admin_characters.php
      $this->show('admin/admin_characters', ['characters'=> $tests]);
    }

    public function admin_characters_modif($id) {
      // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
      $testModel = new CharactersModel();
      $test= $testModel->find($id);
      $this->show('admin/admin_characters_modif', ['id'=> $id,
                                       'name'=> $test['name'],
                                       'health'=> $test['health'],
                                       'energy'=> $test['energy'],
                                       'armor'=> $test['armor'],
                                       'lvl'=> $test['lvl'],
                                       'strength'=> $test['strength'],
                                       'dexterity'=> $test['dexterity'],
                                       'spirit'=> $test['spirit'],
                                       'social'=> $test['social'],
                                       'lvl_spell'=> $test['lvl_spell'],
                                       'exp'=> $test['exp'],
                                     ]);
    }

    public function admin_characters_modif_post($id)
    {
        $valid = new Validation();
        $error = array();
        // Vérification Name
        $result = $valid->validateText($_POST['name'], 3, 255);
        if (!empty($result)) {$error['name'] = $result;}
        // Vérification Health
        $result = $valid->validateNumber($_POST['health'], 1, 9999);
        if (!empty($result)) {$error['health'] = $result;}
        // Vérification Energy
        $result = $valid->validateNumber($_POST['energy'], 1, 9999);
        if (!empty($result)) {$error['energy'] = $result;}
        // Vérification Armor
        $result = $valid->validateNumber($_POST['armor'], 1, 9999);
        if (!empty($result)) {$error['armor'] = $result;}
        // Vérification Niveau
        $result = $valid->validateNumber($_POST['lvl'], 1, 20);
        if (!empty($result)) {$error['lvl'] = $result;}
        // Vérification Force
        $result = $valid->validateNumber($_POST['strength'], 1, 30);
        if (!empty($result)) {$error['strength'] = $result;}
        // Vérification Dexterité
        $result = $valid->validateNumber($_POST['dexterity'], 1, 30);
        if (!empty($result)) {$error['dexterity'] = $result;}
        // Vérification Esprit
        $result = $valid->validateNumber($_POST['spirit'], 1, 30);
        if (!empty($result)) {$error['spirit'] = $result;}
        // Vérification social
        $result = $valid->validateNumber($_POST['social'], 1, 30);
        if (!empty($result)) {$error['social'] = $result;}
        // Vérification lvl_spell
        $result = $valid->validateNumber($_POST['lvl_spell'], 1, 30);
        if (!empty($result)) {$error['lvl_spell'] = $result;}
        // Vérification experience
        $result = $valid->validateNumber($_POST['exp'], 0, 2100);
        if (!empty($result)) {$error['exp'] = $result;}
        // si aucune erreur
        if (count($error) == 0) {
          // met à jour le personnage avec les nouvelles infos inseré
          $testModel = new CharactersModel();
          $testModel->update(array(
            'name' => $_POST['name'],
            'health'=> $_POST['health'],
            'energy'=> $_POST['energy'],
            'armor'=> $_POST['armor'],            
            'lvl' => $_POST['lvl'],
            'strength' => $_POST['strength'],
            'dexterity' => $_POST['dexterity'],
            'spirit' => $_POST['spirit'],
            'social' => $_POST['social'],
            'lvl_spell'=> $_POST['lvl_spell'],
            'exp' => $_POST['exp'],
                ), $id
            );
            $testModel = new CharactersModel();
            $tests= $testModel->findAll();
            // affiche admin_characters.php
            $this->show('admin/admin_characters', ['characters'=> $tests]);
        } else {
      // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
      $testModel = new CharactersModel();
      $test= $testModel->find($id);
      $this->show('admin/admin_characters_modif', ['id'=> $id,
                                       'error'=> $error,
                                       'name'=> $test['name'],
                                       'health'=> $test['health'],
                                       'energy'=> $test['energy'],
                                       'armor'=> $test['armor'],
                                       'lvl'=> $test['lvl'],
                                       'strength'=> $test['strength'],
                                       'dexterity'=> $test['dexterity'],
                                       'spirit'=> $test['spirit'],
                                       'social'=> $test['social'],
                                       'lvl_spell'=> $test['lvl_spell'],
                                       'exp'=> $test['exp'],
                                     ]);
        }
    }

    public function admin_characters_delete($id) {
      $testModel1 = new CharactersModel();
      $testModel1->delete($id);
      $testModel = new CharactersModel();
      $tests= $testModel->findAll();
      // affiche admin_user.php
      $this->redirectToRoute('admin_characters', ['characters'=> $tests]);
    }

    public function admin_inventory() {
      $testModel = new InventoryModel();
      $tests= $testModel->findAll();
      // affiche admin_inventory.php
      $this->show('admin/admin_inventory', ['inventory'=> $tests]);
    }

    public function admin_inventory_modif($id) {
      // On affiche modif_inventory.php
      $testModel = new InventoryModel();
      $test= $testModel->find($id);
      $this->show('admin/admin_inventory_modif', ['id'=> $id,
                                       'amount'=> $test['amount'],
                                     ]);
    }

    public function admin_inventory_modif_post($id)
    {
        $valid = new Validation();
        $error = array();
        // Vérification amount
        $result = $valid->validateNumber($_POST['amount'], 1, 99);
        if (!empty($result)) {$error['amount'] = $result;}
        // si aucune erreur
        if (count($error) == 0) {
          // met à jour le personnage avec les nouvelles infos inseré
          $testModel = new InventoryModel();
          $testModel->update(array(
            'amount' => $_POST['amount'],
                ), $id
            );
            $tests= $testModel->findAll();
            // affiche admin_characters.php
            $this->show('admin/admin_inventory', ['inventory'=> $tests]);
        } else {
          // On affiche modif_inventory.php
          $testModel = new InventoryModel();
          $test= $testModel->find($id);
          $this->show('admin/admin_inventory_modif', ['id'=> $id,
                                           'error'=>$error,
                                           'amount'=> $test['amount'],
                                         ]);
        }
    }

    public function admin_inventory_delete($id) {
      $testModel1 = new InventoryModel();
      $testModel1->delete($id);
      $testModel = new InventoryModel();
      $tests= $testModel->findAll();
      // affiche admin_inventory.php
      $this->redirectToRoute('admin_inventory', ['inventory'=> $tests]);
    }

    public function admin_objects() {
      $testModel = new ObjectsModel();
      $tests= $testModel->findAll();
      // affiche admin_objects.php
      $this->show('admin/admin_objects', ['objects'=> $tests]);
    }

    public function admin_objects_modif($id) {
      // On affiche modif_objects.php
      $testModel = new ObjectsModel();
      $test= $testModel->find($id);
      $this->show('admin/admin_objects_modif', ['id'=> $id,
                                       'name'=> $test['name'],
                                       'dice'=> $test['dice'],
                                       'damage'=> $test['damage'],
                                       'defense'=> $test['defense'],
                                       'value'=> $test['value'],
                                       'weight'=> $test['weight'],
                                       'heal'=> $test['heal'],
                                       'energy'=> $test['energy'],
                                     ]);
    }

    public function admin_objects_modif_post($id)
    {
        $valid = new Validation();
        $error = array();
        // Vérification name
        $result = $valid->validateText($_POST['name'], 3, 255);
        if (!empty($result)) {$error['name'] = $result;}
        // Vérification dice
        $result = $valid->validateNumber($_POST['dice'], 0, 20);
        if (!empty($result)) {$error['dice'] = $result;}
        // Vérification damage
        $result = $valid->validateNumber($_POST['damage'], 0, 20);
        if (!empty($result)) {$error['damage'] = $result;}
        // Vérification Defense
        $result = $valid->validateNumber($_POST['defense'], 0, 15);
        if (!empty($result)) {$error['defense'] = $result;}
        // Vérification value
        $result = $valid->validateNumber($_POST['value'], 0, 9999);
        if (!empty($result)) {$error['value'] = $result;}
        // Vérification weight
        $result = $valid->validateNumber($_POST['weight'], 0, 9999);
        if (!empty($result)) {$error['weight'] = $result;}
        // Vérification heal
        $result = $valid->validateNumber($_POST['heal'], 0, 200);
        if (!empty($result)) {$error['heal'] = $result;}
        // Vérification energy
        $result = $valid->validateNumber($_POST['energy'], 0, 200);
        if (!empty($result)) {$error['energy'] = $result;}
        // si aucune erreur
        if (count($error) == 0) {
          // met à jour le personnage avec les nouvelles infos inseré
          $testModel = new ObjectsModel();
          $testModel->update(array(
            'name' => $_POST['name'],
            'dice' => $_POST['dice'],
            'damage' => $_POST['damage'],
            'defense' => $_POST['defense'],
            'value' => $_POST['value'],
            'weight' => $_POST['weight'],
            'heal' => $_POST['heal'],
            'energy' => $_POST['energy'],
                ), $id
            );
            $testModel = new ObjectsModel();
            $tests= $testModel->findAll();
            // affiche admin_objects.php
            $this->show('admin/admin_objects', ['objects'=> $tests]);
        } else {
          // On affiche modif_objects.php
          $testModel = new ObjectsModel();
          $test= $testModel->find($id);
          $this->show('admin/admin_objects_modif', ['id'=> $id,
                                           'error'=> $error,
                                           'name'=> $test['name'],
                                           'dice'=> $test['dice'],
                                           'damage'=> $test['damage'],
                                           'defense'=> $test['defense'],
                                           'value'=> $test['value'],
                                           'weight'=> $test['weight'],
                                           'heal'=> $test['heal'],
                                           'energy'=> $test['energy'],
                                         ]);
        }
    }

    public function admin_objects_delete($id) {
      $testModel1 = new ObjectsModel();
      $testModel1->delete($id);
      $testModel = new ObjectsModel();
      $tests= $testModel->findAll();
      // affiche admin_objects.php
      $this->redirectToRoute('admin_objects', ['objects'=> $tests]);
    }

    public function admin_pnj() {
      $testModel = new PnjModel();
      $tests= $testModel->findAll();
      // affiche admin_pnj.php
      $this->show('admin/admin_pnj', ['pnj'=> $tests]);
    }

    public function admin_pnj_modif($id) {
      // On affiche modif_pnj.php en récupérant toutes les infos de l'utilisateur
      $testModel = new PnjModel();
      $test= $testModel->find($id);
      $this->show('admin/admin_pnj_modif', ['id'=> $id,
                                       'name'=> $test['name'],
                                       'exp'=> $test['exp'],
                                       'strength'=> $test['strength'],
                                       'dexterity'=> $test['dexterity'],
                                       'spirit'=> $test['spirit'],
                                       'social'=> $test['social'],
                                       'attack'=> $test['attack'],
                                     ]);
    }

    public function admin_pnj_modif_post($id) {
      $valid = new Validation();
      $error = array();
      // Vérification title
      $result = $valid->validateText($_POST['name'], 3, 255);
      if (!empty($result)) {$error['name'] = $result;}
      // Vérification experience
      $result = $valid->validateNumber($_POST['exp'], 1, 2100);
      if (!empty($result)) {$error['exp'] = $result;}
      // Vérification Force
      $result = $valid->validateNumber($_POST['strength'], 1, 30);
      if (!empty($result)) {$error['strength'] = $result;}
      // Vérification Dexterité
      $result = $valid->validateNumber($_POST['dexterity'], 1, 30);
      if (!empty($result)) {$error['dexterity'] = $result;}
      // Vérification Esprit
      $result = $valid->validateNumber($_POST['spirit'], 1, 30);
      if (!empty($result)) {$error['spirit'] = $result;}
      // Vérification social
      $result = $valid->validateNumber($_POST['social'], 1, 30);
      if (!empty($result)) {$error['social'] = $result;}
      // Vérification attack
      $result = $valid->validateNumber($_POST['attack'], 1, 50);
      if (!empty($result)) {$error['attack'] = $result;}
      // si aucune erreur
      if (count($error) == 0) {
        // met à jour le personnage avec les nouvelles infos inseré
        $testModel = new PnjModel();
        $testModel->update(array(
          'name' => $_POST['name'],
          'exp' => $_POST['exp'],
          'strength' => $_POST['strength'],
          'dexterity' => $_POST['dexterity'],
          'spirit' => $_POST['spirit'],
          'social' => $_POST['social'],
          'attack' => $_POST['attack'],
              ), $id
          );
          $testModel = new PnjModel();
          $tests= $testModel->findAll();
          // affiche admin_pnj.php
          $this->show('admin/admin_pnj', ['pnj'=> $tests]);
      } else {
        // On affiche modif_pnj.php en récupérant toutes les infos de l'utilisateur
        $testModel = new PnjModel();
        $test= $testModel->find($id);
        $this->show('admin/admin_pnj_modif', ['id'=> $id,
                                         'name'=> $test['name'],
                                         'exp'=> $test['exp'],
                                         'strength'=> $test['strength'],
                                         'dexterity'=> $test['dexterity'],
                                         'spirit'=> $test['spirit'],
                                         'social'=> $test['social'],
                                         'attack'=> $test['attack'],
                                       ]);
      }
    }

    public function admin_pnj_delete($id) {
      $testModel1 = new PnjModel();
      $testModel1->delete($id);
      $testModel = new PnjModel();
      $tests= $testModel->findAll();
      // affiche admin_pnj.php
      $this->redirectToRoute('admin_pnj', ['pnj'=> $tests]);
    }
}
