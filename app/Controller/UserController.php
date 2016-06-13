<?php
namespace Controller;

use \W\Controller\Controller;
use \Services\Validation;
use \Model\AuthentificationModel;
use \Model\UserModel;
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
                'avatar' => 'http://compagnie.vmdancestudio.fr/wp-content/uploads/sites/5/2014/06/profil-photo-manquante.jpg',
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
}
