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
    $users = new UserModel();
    $all_users= $users->findAll();
    // affiche admin_user.php
    $this->show('admin/admin_user', ['users'=> $all_users]);
  }

  public function admin_user_modif($id)
  {
    // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
    $users = new UserModel();
    $user= $users->find($id);
    $this->show('admin/modif_user', ['id'=> $id,
                                     'pseudo'=> $user['pseudo'],
                                     'firstname'=> $user['firstname'],
                                     'lastname'=> $user['lastname'],
                                     'email'=> $user['email']
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
      $users = new UserModel();
      $user = $users->find($id);
      $user_mail = $users->emailExists($_POST['mail']);
      if ($user['email'] =! $_POST['mail'] ) {
        if ($user_mail) {$error['mail'] = "l'email existe déjà";}
      }
      $user_pseudo = $users->usernameExists($_POST['pseudo']);
      if ($user['pseudo'] =! $_POST['pseudo'] ) {
        if ($user_pseudo) {$error['pseudo'] = "le pseudo existe déjà";}
      }

      // si aucune erreur
      if (count($error) == 0) {
        // met à jour l'utilisateur avec les nouvelles infos inserer
        $users = new UserModel();
        $users->update(array(
                  'pseudo' => $_POST['pseudo'],
                  'firstname' => $_POST['firstname'],
                  'lastname' => $_POST['lastname'],
                  'email' => $_POST['mail'],
                  'last_connexion' => date('Y-m-d H:i:s'),
                  'role' => $_POST['role'],
                  'modified_at' => date('Y-m-d H:i:s'),
              ), $id
          );
          $all_users= $users->findAll();
          // affiche admin_user.php
          $this->show('admin/admin_user', ['users'=> $all_users]);
      } else {
        $users = new UserModel();
        $user= $users->find($id);
        $this->show('admin/modif_user', ['error' => $error,
                                         'id'=> $id,
                                         'pseudo'=> $user['pseudo'],
                                         'firstname'=> $user['firstname'],
                                         'lastname'=> $user['lastname'],
                                         'email'=> $user['email']
                                       ]);
      }
    }
  }

  public function admin_user_delete($id) {
    $users = new UserModel();
    $users->delete($id);
    $all_users= $users->findAll();
    // affiche admin_user.php
    $this->redirectToRoute('admin_user', ['users'=> $all_users]);
  }

  public function admin_news() {
    $news = new NewsModel();
    $all_news= $news->findAll();
    // affiche admin_news.php
    $this->show('admin/admin_news', ['news'=> $all_news]);
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
        $news = new NewsModel();
        $news->insert(array(
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $loggedUser['pseudo'],
            )
        );
        // rammène l'utilisateur a l'accueil
        $all_news= $news->findAll();
        // affiche admin_news.php
        $this->redirectToRoute('admin_news', ['news'=> $all_news]);
    } else {
      // récupère les erreurs et permet de les réutiliser dans register.php
      $this->show('admin/admin_news_add', ['error' => $error]);
    }
  }

  public function admin_news_delete($id) {
    $news = new NewsModel();
    $news->delete($id);
    $all_news= $news->findAll();
    // affiche admin_user.php
    $this->redirectToRoute('admin_news', ['news'=> $all_news]);
  }

    public function admin_news_modif($id)
    {
      // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
      $news = new NewsModel();
      $new= $news->find($id);
      $this->show('admin/admin_news_modif', ['id'=> $id,
                                       'title'=> $new['title'],
                                       'content'=> $new['content'],
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
          $news = new NewsModel();
          // récupération des infos utilisateur
          $loggedUser = $this->getUser();
          $news->update(array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $loggedUser['pseudo'],
                ), $id
            );
            $all_news= $news->findAll();
            // affiche admin_news.php
            $this->redirectToRoute('admin_news', ['news'=> $all_news]);
        } else {
          $news = new NewsModel();
          $new= $news->find($id);
          $this->show('admin/admin_news_modif', ['error' => $error,
                                                 'id'=> $id,
                                                 'title'=> $new['title'],
                                                 'content'=> $new['content'],
                                                 ]);
        }
    }
    public function admin_characters() {
      $characters = new CharactersModel();
      $all_characters = $characters->findAll();
      // affiche admin_characters.php
      $this->show('admin/admin_characters', ['characters'=> $all_characters]);
    }

    public function admin_characters_modif($id) {
      // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
      $characters = new CharactersModel();
      $character= $characters->find($id);
      $this->show('admin/admin_characters_modif', ['id'=> $id,
                                       'name'=> $character['name'],
                                       'health'=> $character['health'],
                                       'energy'=> $character['energy'],
                                       'armor'=> $character['armor'],
                                       'lvl'=> $character['lvl'],
                                       'strength'=> $character['strength'],
                                       'dexterity'=> $character['dexterity'],
                                       'spirit'=> $character['spirit'],
                                       'social'=> $character['social'],
                                       'lvl_spell'=> $character['lvl_spell'],
                                       'exp'=> $character['exp'],
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
          $characters = new CharactersModel();
          $characters->update(array(
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
            $all_characters= $characters->findAll();
            // affiche admin_characters.php
            $this->show('admin/admin_characters', ['characters'=> $all_characters]);
        } else {
      // On affiche modif_user.php en récupérant toutes les infos de l'utilisateur
      $characters = new CharactersModel();
      $character= $characters->find($id);
      $this->show('admin/admin_characters_modif', ['id'=> $id,
                                       'error'=> $error,
                                       'name'=> $character['name'],
                                       'health'=> $character['health'],
                                       'energy'=> $character['energy'],
                                       'armor'=> $character['armor'],
                                       'lvl'=> $character['lvl'],
                                       'strength'=> $character['strength'],
                                       'dexterity'=> $character['dexterity'],
                                       'spirit'=> $character['spirit'],
                                       'social'=> $character['social'],
                                       'lvl_spell'=> $character['lvl_spell'],
                                       'exp'=> $character['exp'],
                                     ]);
        }
    }

    public function admin_characters_delete($id) {
      $characters = new CharactersModel();
      $characters->delete($id);
      $all_characters= $characters->findAll();
      // affiche admin_user.php
      $this->redirectToRoute('admin_characters', ['characters'=> $all_characters]);
    }

    public function admin_inventory() {
      $inventories = new InventoryModel();
      $all_inventories= $inventories->findAll();
      // affiche admin_inventory.php
      $this->show('admin/admin_inventory', ['inventory'=> $all_inventories]);
    }

    public function admin_inventory_modif($id) {
      // On affiche modif_inventory.php
      $inventories = new InventoryModel();
      $inventory= $inventories->find($id);
      $this->show('admin/admin_inventory_modif', ['id'=> $id,
                                       'amount'=> $inventory['amount'],
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
          $inventories = new InventoryModel();
          $inventories->update(array(
            'amount' => $_POST['amount'],
                ), $id
            );
            $all_inventories= $inventories->findAll();
            // affiche admin_characters.php
            $this->show('admin/admin_inventory', ['inventory'=> $all_inventories]);
        } else {
          // On affiche modif_inventory.php
          $inventories = new InventoryModel();
          $inventory= $inventories->find($id);
          $this->show('admin/admin_inventory_modif', ['id'=> $id,
                                           'error'=>$error,
                                           'amount'=> $inventory['amount'],
                                         ]);
        }
    }

    public function admin_inventory_delete($id) {
      $inventories = new InventoryModel();
      $inventories->delete($id);
      $all_inventories= $inventories->findAll();
      // affiche admin_inventory.php
      $this->redirectToRoute('admin_inventory', ['inventory'=> $all_inventories]);
    }

    public function admin_objects() {
      $objects = new ObjectsModel();
      $all_objects= $objects->findAll();
      // affiche admin_objects.php
      $this->show('admin/admin_objects', ['objects'=> $all_objects]);
    }

    public function admin_objects_modif($id) {
      // On affiche modif_objects.php
      $objects = new ObjectsModel();
      $object= $objects->find($id);
      $this->show('admin/admin_objects_modif', ['id'=> $id,
                                       'name'=> $object['name'],
                                       'dice'=> $object['dice'],
                                       'damage'=> $object['damage'],
                                       'defense'=> $object['defense'],
                                       'value'=> $object['value'],
                                       'weight'=> $object['weight'],
                                       'heal'=> $object['heal'],
                                       'energy'=> $object['energy'],
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
          $objects = new ObjectsModel();
          $objects->update(array(
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
            $all_objects= $objects->findAll();
            // affiche admin_objects.php
            $this->show('admin/admin_objects', ['objects'=> $all_objects]);
        } else {
          // On affiche modif_objects.php
          $objects = new ObjectsModel();
          $object= $objects->find($id);
          $this->show('admin/admin_objects_modif', ['id'=> $id,
                                           'error'=> $error,
                                           'name'=> $object['name'],
                                           'dice'=> $object['dice'],
                                           'damage'=> $object['damage'],
                                           'defense'=> $object['defense'],
                                           'value'=> $object['value'],
                                           'weight'=> $object['weight'],
                                           'heal'=> $object['heal'],
                                           'energy'=> $object['energy'],
                                         ]);
        }
    }

    public function admin_objects_delete($id) {
      $objects = new ObjectsModel();
      $objects->delete($id);
      $all_objects= $objects->findAll();
      // affiche admin_objects.php
      $this->redirectToRoute('admin_objects', ['objects'=> $all_objects]);
    }

    public function admin_pnj() {
      $pnjs = new PnjModel();
      $all_pnjs= $pnjs->findAll();
      // affiche admin_pnj.php
      $this->show('admin/admin_pnj', ['pnj'=> $all_pnjs]);
    }

    public function admin_pnj_modif($id) {
      // On affiche modif_pnj.php en récupérant toutes les infos de l'utilisateur
      $pnjs = new PnjModel();
      $pnj= $pnjs->find($id);
      $this->show('admin/admin_pnj_modif', ['id'=> $id,
                                       'name'=> $pnj['name'],
                                       'exp'=> $pnj['exp'],
                                       'strength'=> $pnj['strength'],
                                       'dexterity'=> $pnj['dexterity'],
                                       'spirit'=> $pnj['spirit'],
                                       'social'=> $pnj['social'],
                                       'attack'=> $pnj['attack'],
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
        $pnjs = new PnjModel();
        $pnjs->update(array(
          'name' => $_POST['name'],
          'exp' => $_POST['exp'],
          'strength' => $_POST['strength'],
          'dexterity' => $_POST['dexterity'],
          'spirit' => $_POST['spirit'],
          'social' => $_POST['social'],
          'attack' => $_POST['attack'],
              ), $id
          );
          $pnjs = new PnjModel();
          $all_pnjs= $pnjs->findAll();
          // affiche admin_pnj.php
          $this->show('admin/admin_pnj', ['pnj'=> $all_pnjs]);
      } else {
        // On affiche modif_pnj.php en récupérant toutes les infos de l'utilisateur
        $pnjs = new PnjModel();
        $pnj= $pnjs->find($id);
        $this->show('admin/admin_pnj_modif', ['id'=> $id,
                                         'name'=> $pnj['name'],
                                         'exp'=> $pnj['exp'],
                                         'strength'=> $pnj['strength'],
                                         'dexterity'=> $pnj['dexterity'],
                                         'spirit'=> $pnj['spirit'],
                                         'social'=> $pnj['social'],
                                         'attack'=> $pnj['attack'],
                                       ]);
      }
    }

    public function admin_pnj_delete($id) {
      $pnjs = new PnjModel();
      $pnjs->delete($id);
      $all_pnjs= $pnjs->findAll();
      // affiche admin_pnj.php
      $this->redirectToRoute('admin_pnj', ['pnj'=> $all_pnjs]);
    }
}
