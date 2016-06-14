<?php
namespace Controller;

use \W\Controller\Controller;
use \Services\Validation;
use \Model\AuthentificationModel;
use \Model\UserModel;
use \Model\AvatarModel;
use \Model\StringUtils;

class UserController extends Controller
{
  public function login()
  {
    $this->show('user/login');
  }

  public function loginUser()
  {
    $valid = new Validation();
    $errors = array();
    $result = $valid->validateText($_POST['pseudo_or_email'], 3, 50);
    if (!empty($result)) {$errors['pseudo_or_email'] = $result;}
    $result = $valid->validateText($_POST['password'], 3, 50);
    if (!empty($result)) {$errors['password'] = $result;}
    $testAuthentification = new AuthentificationModel();
    $test = $testAuthentification->isValidLoginInfo($_POST['pseudo_or_email'],$_POST['password']);
    if ($test == 0) { $errors['password'] = 'mauvais password ou mauvais login';}
    if (count($errors) == 0) {
      $testModel1 = new UserModel();
      $test1 = $testModel1-> getUserByUsernameOrEmail($_POST['pseudo_or_email']);
      $testAuthentification1 = new AuthentificationModel();
      $testAuthentification1->logUserIn($test1);
      $this->redirect('http://localhost/FinalProject/public/');
    } else {
        if (!empty($errors['pseudo_or_email']) && !empty($errors['password'])) {$this->show('user/login',['errorLogin' =>$errors['pseudo_or_email'],'errorPassword' => $errors['password']]);}
        elseif (!empty($errors['pseudo_or_email'])){$this->show('user/login',['errorLogin' => $errors['pseudo_or_email']]);}
        elseif (!empty($errors['password'])){$this->show('user/login',['errorPassword' => $errors['password']]);}
    }
  }

  public function register()
  {
    $this->show('user/register');
  }

  public function registerUser()
  {
    $valid = new Validation();
    $error = array();
    $result = $valid->validateText($_POST['pseudo'], 3, 50);
    if (!empty($result)) {$error['pseudo'] = $result;}
    $result = $valid->validateText($_POST['firstname'], 3, 50);
    if (!empty($result)) {$error['firstname'] = $result;}
    $result = $valid->validateText($_POST['lastname'], 3, 50);
    if (!empty($result)) {$error['lastname'] = $result;}
    $result = $valid->validateText($_POST['mail'], 3, 50);
    if (!empty($result)) {$error['mail'] = $result;}
    $result = $valid->validateText($_POST['password1'], 3, 50);
    if (!empty($result)) {$error['password1'] = $result;}
    $result = $valid->validateText($_POST['password2'], 3, 50);
    if (!empty($result)) {$error['password2'] = $result;}
    if ($_POST['password1'] != $_POST['password2']) {$error['password2'] = "Vos mots de passes sont différents !";}
    $testModel1 = new UserModel();
    $test1 = $testModel1->emailExists($_POST['mail']);
    $testModel2 = new UserModel();
    $test2 = $testModel2->usernameExists($_POST['pseudo']);
    if ($test1) {$error['mail'] = "l'email existe déjà";}
    if ($test2) {$error['pseudo'] = "le pseudo existe déjà";}
    //$x = $valid->checkbox($_POST['active']);
    if (count($error) == 0) {
        $password1 = $_POST['password1'];
        $auth = new AuthentificationModel();
        $password = $auth->hashPassword($password1);
        $token1 = new StringUtils();
        $token = $token1->randomString();
        $testModel = new UserModel();
        $testModel->insert(array(
                'pseudo' => $_POST['pseudo'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['mail'],
                'password' => $password,
                'avatar' => 1,
                'role'=> 'user',
                'token' => $token,
                'last_connexion' => date('Y-m-d H:i:s'),
                'ip' => $_SERVER['SERVER_ADDR'],
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s'),
            )
        );
        $articles= $testModel->findAll();
        $this->redirect('http://localhost/FinalProject/public/');
    } else {
        $this->show('user/register', ['error' => $error]);
    }
  }

  public function logout()
  {
    $authentificationModel = new AuthentificationModel();
    $authentificationModel->logUserOut();
    $this->redirect('http://localhost/FinalProject/public/');
  }
  public function forgotpassword()
  {
    $this->show('user/forgotpassword');
  }
  public function forgotpassworduser()
  {
    $valid = new Validation();
    $error = array();
    $result = $valid->validateText($_POST['email'], 3, 50);
    if (!empty($result)) {$error['email'] = $result;}
    $testModel = new UserModel();
    $test = $testModel->emailExists($_POST['email']);
    if (count($error) == 0) {
      if ($test) {
        $testModel1 = new UserModel();
        $test1 = $testModel1-> getUserByUsernameOrEmail($_POST['email']);
        $token = $test1['token'];
        $this->show('user/sent_mail', ['token'=> $token, 'email'=>$_POST['email']]);
      }
    }
  }

  public function forgotpasswordmodif($token)
  {
    $this->show('user/forgotpasswordmodif', ['token'=> $token]);
  }

  public function forgotpasswordmodifpost($token)
  {
    $valid = new Validation();
    $error = array();
    $result = $valid->validateText($_POST['new_password1'], 3, 50);
    if (!empty($result)) {$error['new_password1'] = $result;}
    $result = $valid->validateText($_POST['new_password2'], 3, 50);
    if (!empty($result)) {$error['new_password2'] = $result;}
    if ($_POST['new_password1'] != $_POST['new_password2']) {$error['new_password2'] = "Vos mots de passes sont différents !";}
    if (count($error) == 0) {
        $password1 = $_POST['new_password1'];
        $auth = new AuthentificationModel();
        $password = $auth->hashPassword($password1);
        $new_token1 = new StringUtils();
        $new_token = $new_token1->randomString();
        $testModel2 = new UserModel();
        $get_id = $testModel2->getUserByToken($token);
        $id = $get_id['id'];
        $testModel = new UserModel();
        $testModel->update(array(
                'password' => $password,
                'token' => $new_token,
                'modified_at' => date('Y-m-d H:i:s'),
            ), $id
        );
        $articles= $testModel->findAll();
        $this->redirect('http://localhost/FinalProject/public/');
    } else {
        $this->show('user/forgotpasswordmodif', ['error' => $error]);
    }
  }

  public function profil() {
    $loggedUser = $this->getUser();
    $testModel = new AvatarModel();
    $test1 = $testModel-> getUserWithAvatar($loggedUser['avatar']);
    $this->show('user/profil', ['img_path'=> $test1['img_path']]);
  }

  public function profilPost() {
    //Tableau d'erreurs vide
    $errors = array();
    //Par défaut $success est vide
    $success = false;
    //On définit une variable qui contient les extensions de fichier désirées
    $extensionsAutorisees = array("jpeg", "jpg", "gif", "png");



    if(!empty($_POST['submitfile'])) {

      $file = $_FILES['image'];
      $type_file = $file['type'];
      $size_file = $file['size'];
      if($file['error'] > 0){
        if($file['error'] == 4){
          $errors['file'] = 'Vous devez télécharger une image.';
        }elseif($file['error'] == 1 || $file['error'] == 2){
          $errors['size'] = 'La taille de votre image est trop grande.';
        }elseif($file['error'] == 3){
          $errors['incomplet'] = 'Votre image n a pas pu etre télécharger completement, veuillez recommencer.';
        }elseif($file['error'] == 6 || $file['error'] == 7){
          $errors['admin'] = 'Votre image n a pas pu etre enregistrer, veuillez contacter l admin du site.';
        }
      }else{
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        $goodExtension = array('image/jpg', 'image/jpeg','image/png', 'image/gif');
        if($size_file > 2000000 || filesize($file['tmp_name']) > 2000000){
            $errors['size'] = 'La taille de votre image est trop grande.';
        }elseif(!in_array($mime, $goodExtension)){
          $errors['image'] = 'Veuillez utiliser une extension de type : jpg, jpeg, gif, png';
        }
      }
      if(count($errors) == 0){
        $i_point = strrpos($file['name'], '.');
        $fileExtension = substr($file['name'], $i_point, strlen($file['name']));
        $newName = substr($file['name'], 0, 4) . uniqid(). $fileExtension;
        echo $newName;
        $destination = 'assets/img/'.$newName;
        $path = 'img/'. $newName;
        if(move_uploaded_file ($file['tmp_name'], $destination)){
          $success = true;
          $testModel1 = new AvatarModel();
          $loggedUser = $this->getUser();
          $testModel1->insert(array(
                        'user_id' => $loggedUser['id'],
                        'name' => $newName,
                        'img_path' => $path,
                        'size' => $file['size'],
                        'type' => $fileExtension,
                      )
                    );

          $testModel2 = new UserModel();
          $testModel3 = new AvatarModel();
          $test3 = $testModel3->getIdByUserId($newName);
          $testModel2->update(array(
                        'avatar' => $test3['id']
            ), $loggedUser['id']
          );
          if (!empty($file['name'])) {
            $testModel = new AvatarModel();
            $test1 = $testModel-> getUserWithAvatar($loggedUser['avatar']);
            $authentificationModel = new AuthentificationModel();
            $authentificationModel->refreshUser();
            $this->show('user/profil', ['img_path'=> $test1['img_path']]);
          }
        }
      }else {
        $loggedUser = $this->getUser();
        $testModel = new AvatarModel();
        $test1 = $testModel-> getUserWithAvatar($loggedUser['avatar']);
        $this->show('user/profil', ['img_path'=> $test1['img_path'], 'errors'=> $errors]);
      }
    }
  }
}
