<?php
namespace Controller;

use \Controller\Controller;
use \Controller\MailController;
use \Services\Validation;
use \Model\AuthentificationModel;
use \Model\UserModel;
use \Model\AvatarModel;
use \Model\StringUtils;

class UserController extends Controller
{

  public function contact()
  {
    // affiche contact.php
    $this->show('user/contact');
  }
  public function contact_post()
  {
    $valid = new Validation();
    $error = array();
    // Vérification Pseudo
    $result = $valid->validateText($_POST['nom'], 3, 50);
    if (!empty($result)) {$error['nom'] = $result;}
    // Vérification firstname
    $result = $valid->validateText($_POST['email'], 3, 50);
    if (!empty($result)) {$error['email'] = $result;}
    // Vérification lastname
    $result = $valid->validateText($_POST['sujet'], 3, 50);
    if (!empty($result)) {$error['sujet'] = $result;}
    // Vérification mail
    $result = $valid->validateText($_POST['message'], 3, 1000);
    if (!empty($result)) {$error['message'] = $result;}
    // Si il n'y a pas d'erreur
    if (count($error) == 0) {
        // envoi mail
        $testModel2 = new MailController();
        $testModel2->email_contact($_POST['sujet'], $_POST['message'], $_POST['email'],$_POST['nom']);
        $this->show('user/sent_mail', ['mail' => $_POST['email']]);
    } else {
      // récupère les erreurs et permet de les réutiliser dans register.php
      $this->show('user/contact', ['error' => $error]);
    }
  }
  
  public function login()
  {
    // affiche login.php
    $this->show('user/login');
  }

  public function loginUser()
  {
    $valid = new Validation();
    $errors = array();
    // Vérification Pseudo ou email
    $result = $valid->validateText($_POST['pseudo_or_email'], 3, 50);
    if (!empty($result)) {$errors['pseudo_or_email'] = $result;}
    // Vérification Password
    $result = $valid->validateText($_POST['password'], 3, 50);
    if (!empty($result)) {$errors['password'] = $result;}
    // Verification que le pseudo/email et password correspondent aux infos dans la base de donnée
    $Authentification = new AuthentificationModel();
    $Authentification_login_infos = $Authentification->isValidLoginInfo($_POST['pseudo_or_email'],$_POST['password']);
    if ($Authentification_login_infos == 0) { $errors['password'] = 'mauvais password ou mauvais login';}
    $users = new UserModel();
    $user = $users-> getUserByUsernameOrEmail($_POST['pseudo_or_email']);
    if ($user['actif'] == 0) {
        $errors['pseudo_or_email'] = 'Veuillez activer votre e-mail';
    }
    //Si il n'y a pas d'erreurs
    if (count($errors) == 0) {
      // récupère les infos utilisateurs
      $Authentification = new AuthentificationModel();
      // connecte l'utilisateur
      $Authentification->logUserIn($user);
      // rammène l'utilisateur a l'accueil
      $this->redirectToRoute('default_home');
    } else {
        // récupère les erreurs et permet de les réutiliser dans login.php
        if (!empty($errors['pseudo_or_email']) && !empty($errors['password'])) {$this->show('user/login',['errorLogin' =>$errors['pseudo_or_email'],'errorPassword' => $errors['password']]);}
        elseif (!empty($errors['pseudo_or_email'])){$this->show('user/login',['errorLogin' => $errors['pseudo_or_email']]);}
        elseif (!empty($errors['password'])){$this->show('user/login',['errorPassword' => $errors['password']]);}
    }
  }

  public function register()
  {
    // affiche register.php
    $this->show('user/register');
  }

  public function registerUser()
  {
    $valid = new Validation();
    $error = array();
    // Vérification Pseudo
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
    // Vérification password1
    $result = $valid->validateText($_POST['password1'], 3, 50);
    if (!empty($result)) {$error['password1'] = $result;}
    // Vérification password2
    $result = $valid->validateText($_POST['password2'], 3, 50);
    if (!empty($result)) {$error['password2'] = $result;}
    // On vérifie que les passwords sont identiques
    if ($_POST['password1'] != $_POST['password2']) {$error['password2'] = "Vos mots de passes sont différents !";}
    // On verifie que l'email et pseudo ne sont pas déja utilisé dans la base de donnée
    $users = new UserModel();
    $user_mail = $users->emailExists($_POST['mail']);
    $user_pseudo = $users->usernameExists($_POST['pseudo']);
    if ($user_mail) {$error['mail'] = "l'email existe déjà";}
    if ($user_pseudo) {$error['pseudo'] = "le pseudo existe déjà";}
    // Si il n'y a pas d'erreur
    if (count($error) == 0) {
        // récupération du nouveau mot de passe et on le crypte
        $password1 = $_POST['password1'];
        $auth = new AuthentificationModel();
        $password = $auth->hashPassword($password1);
        // création du token
        $token1 = new StringUtils();
        $token = $token1->randomString();
        // insertion du nouvel utilisateur dans la base de donnée
        $users = new UserModel();
        $users->insert(array(
                'pseudo' => $_POST['pseudo'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['mail'],
                'password' => $password,
                'avatar_id' => 1,
                'characters_id' => 0,
                'role'=> 'user',
                'actif' => 0,
                'token' => $token,
                'last_connexion' => date('Y-m-d H:i:s'),
                'ip' => $_SERVER['SERVER_ADDR'],
                'created_at' => date('Y-m-d H:i:s'),
                'modified_at' => date('Y-m-d H:i:s'),
            )
        );
        // rammène l'utilisateur a l'accueil
        $body = '/validmail/'.$token;
        $mails = new MailController();
        $mails->email_validation($body , $_POST['mail']);
        $this->show('user/sent_mail', ['token'=> $token, 'mail'=>$_POST['mail']]);
    } else {
      // récupère les erreurs et permet de les réutiliser dans register.php
      $this->show('user/register', ['error' => $error]);
    }
  }

    public function validmail($token)
  {
    // affiche la page validmail.php
        $users = new UserModel();
        $get_id = $users->getUserByToken($token);
        $id = $get_id['id'];
        // met a jour l'utilisateur avec le nouveau mot de passe
        $users->update(array(
                'actif' => 1,
            ), $id
        );

    $this->show('user/validmail');
  }

  public function logout()
  {
    // déconnecte l'utilisateur et le rammène à l'accueil
    $authentificationModel = new AuthentificationModel();
    $authentificationModel->logUserOut();
    $this->redirectToRoute('default_home');
  }
  public function forgotpassword()
  {
    // affiche forgotpassword.php
    $this->show('user/forgotpassword');
  }
  public function forgotpassworduser()
  {
    $valid = new Validation();
    $error = array();
    // Vérification mail
    $result = $valid->validateText($_POST['email'], 3, 50);
    if (!empty($result)) {$error['email'] = $result;}
    // Vérifie si le mail existe déja dans la base de donnée
    $users = new UserModel();
    $user_mail = $users->emailExists($_POST['email']);
    // Si aucune erreur
    if (count($error) == 0) {
      if ($user_mail) {
        //génére la page de modification de mot de passe en utilisant le token
        $users = new UserModel();
        $test1 = $users-> getUserByUsernameOrEmail($_POST['email']);
        $token = $test1['token'];
        $body = '/forgotpassword/'.$token;
        $mail = new MailController();
        $mail->email($body , $_POST['email']);
        $this->show('user/sent_mail', ['token'=> $token, 'email'=>$_POST['email']]);
      }
    }
  }

  public function forgotpasswordmodif($token)
  {
    // affiche la page forgotpasswordmodif.php
    $this->show('user/forgotpasswordmodif', ['token'=> $token]);
  }

  public function forgotpasswordmodifpost($token)
  {
    $valid = new Validation();
    $error = array();
    // Vérification new_password1
    $result = $valid->validateText($_POST['new_password1'], 3, 50);
    if (!empty($result)) {$error['new_password1'] = $result;}
    // Vérification new_password2
    $result = $valid->validateText($_POST['new_password2'], 3, 50);
    if (!empty($result)) {$error['new_password2'] = $result;}
    // Verifier si les deux mots de passes taper sont bien identique
    if ($_POST['new_password1'] != $_POST['new_password2']) {$error['new_password2'] = "Vos mots de passes sont différents !";}
    // Si il n'y a pas d'erreur
    if (count($error) == 0) {
        // récupération du nouveau mot de passe et on le crypte
        $password1 = $_POST['new_password1'];
        $auth = new AuthentificationModel();
        $password = $auth->hashPassword($password1);
        // génération d'un nouveau token
        $new_token1 = new StringUtils();
        $new_token = $new_token1->randomString();
        // récupération de l'utilisateur dans la base de donnée
        $users = new UserModel();
        $get_id = $users->getUserByToken($token);
        $id = $get_id['id'];
        // met a jour l'utilisateur avec le nouveau mot de passe
        $users->update(array(
                'password' => $password,
                'token' => $new_token,
                'modified_at' => date('Y-m-d H:i:s'),
            ), $id
        );
      // redirige à l'accueil
      $this->redirectToRoute('default_home');
    } else {
        // affiche la page forgotpasswordmodif.php en recupérant les erreurs
        $this->show('user/forgotpasswordmodif', ['error' => $error]);
    }
  }

  public function profil() {
    //récupération des infos de l'utilisateur connecté
    $loggedUser = $this->getUser();
    // affiche la page de profil de l'utilisateur et récupere l'image de profil
    $avatars = new AvatarModel();
    $test1 = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
    $this->show('user/profil', ['img_path'=> $test1['img_path']]);
  }

  public function profilPost() {
    //Tableau d'erreurs vide
    $errors = array();
    //Par défaut $success est vide
    $success = false;
    //On définit une variable qui contient les extensions de fichier désirées
    $extensionsAutorisees = array("jpeg", "jpg", "gif", "png");


    // sur la validation du formulaire image
    if(!empty($_POST['submitfile'])) {

      // vérifi toutes les infos d'envoi d'image
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
      // s'il n'y a pas d'erreurs
      if(count($errors) == 0){
        //récupère toutes les infos de l'image
        $i_point = strrpos($file['name'], '.');
        $fileExtension = substr($file['name'], $i_point, strlen($file['name']));
        $newName = substr($file['name'], 0, 4) . uniqid(). $fileExtension;
        $destination = 'assets/img/avatar/'.$newName;
        $path = 'img/avatar/'. $newName;
        // si le telechargement de l'image c'est bien passer
        if(move_uploaded_file ($file['tmp_name'], $destination)){
          $success = true;
          $avatars = new AvatarModel();
          $loggedUser = $this->getUser();
          // ajoute l'image à la base de donnée
          $avatars->insert(array(
                        'user_id' => $loggedUser['id'],
                        'name' => $newName,
                        'img_path' => $path,
                        'size' => $file['size'],
                        'type' => $fileExtension,
                      )
                    );
          // récupère l'id de l'avatar_id et l'ajoute dans la base de donnée utilisateur
          $users = new UserModel();
          $avatar = $avatars->getIdByUserId($newName);
          $users->update(array(
                        'avatar_id' => $avatar['id']
            ), $loggedUser['id']
          );
          if (!empty($file['name'])) {
            // raffraichit les donnée de l'utilisateur pour que les modification soit mit à jour et affiche la page de proifil avec la nouvelle image
            $avatars = new AvatarModel();
            $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
            $authentificationModel = new AuthentificationModel();
            $authentificationModel->refreshUser();
            $this->show('user/profil', ['img_path'=> $avatar['img_path']]);
          }
        }
      }else {
        // affiches profil.php avec les erreurs
        $loggedUser = $this->getUser();
        $avatars = new AvatarModel();
        $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
        $this->show('user/profil', ['img_path'=> $avatar['img_path'], 'errors'=> $errors]);
      }
    }

    // sur la validation du formulaire suppression image
    if(!empty($_POST['submitfile1'])) {
      //récupération des infos de l'utilisateur connecté
      $loggedUser = $this->getUser();
      // remet l'image de profil classique
      $users = new UserModel();
      $users->update(array(
          'avatar_id' => 1
        ), $loggedUser['id']
      );
      // raffraichit l'utilisateur, affiche le profil.php et recupere l'avatar_id de l'utilisateur
      $avatars = new AvatarModel();
      $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
      $authentificationModel = new AuthentificationModel();
      $authentificationModel->refreshUser();
      $this->show('user/profil', ['img_path'=> $avatar['img_path']]);
    }
    // sur la validation du formulaire de mise à jour des infos utilisateur
    if(!empty($_POST['submitfile2'])) {
      //récupération des infos de l'utilisateur connecté
      $loggedUser = $this->getUser();
      $valid = new Validation();
      $error = array();
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
      $user_exist = $users->usernameExists($_POST['pseudo']);
      if ($_POST['mail'] == $loggedUser['email']) {}
      else {
          $users = new UserModel();
          $user_mail_exist = $users->emailExists($_POST['mail']);
          if ($user_mail_exist) {$error['mail'] = "l'email existe déjà";}
        }
      if ($_POST['pseudo'] == $loggedUser['pseudo']) {}
        else {
          $users = new UserModel();
          $user_exist = $users->usernameExists($_POST['pseudo']);
          if ($user_exist) {$error['pseudo'] = "le pseudo existe déjà";}
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
                  'modified_at' => date('Y-m-d H:i:s'),
              ), $loggedUser['id']
          );
          // raffraichit les infos utilisateur, affiche la page profil  en recuperant l'image de profil
          $avatars = new AvatarModel();
          $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
          $authentificationModel = new AuthentificationModel();
          $authentificationModel->refreshUser();
          $this->show('user/profil', ['img_path'=> $avatar['img_path']]);
      } else {
        // raffraichit les infos utilisateur, affiche la page profil  en recuperant l'image de profil
        $loggedUser = $this->getUser();
        $avatars = new AvatarModel();
        $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
        $authentificationModel = new AuthentificationModel();
        $authentificationModel->refreshUser();
        $this->show('user/profil', ['img_path'=> $avatar['img_path'], 'error'=> $error]);
      }
    }
    // sur la validation du formulaire de changement de mot de passe
    if(!empty($_POST['submitfile3'])) {
      $loggedUser = $this->getUser();
      $valid = new Validation();
      $error = array();
      // Vérification oldPassword
      $result = $valid->validateText($_POST['oldPassword'], 3, 50);
      if (!empty($result)) {$error['oldPassword'] = $result;}
      // Vérification newPassword1
      $result = $valid->validateText($_POST['newPassword'], 3, 50);
      if (!empty($result)) {$error['newPassword'] = $result;}
      // Vérification newPassword2
      $result = $valid->validateText($_POST['newPassword2'], 3, 50);
      if (!empty($result)) {$error['newPassword2'] = $result;}
      // On vérifie si les mots de passes sont identiques et que l'ancien mot de passe soit bien identique dans la base de donnée
      $authentificationModel = new AuthentificationModel();
      $authentification_password = $authentificationModel -> isValidPassword($loggedUser['pseudo'], $_POST['oldPassword']);
      if ($_POST['newPassword'] != $_POST['newPassword2']) {$error['newPassword2'] = "Vos nouveaux mots de passes sont différents !";}
      if ($authentification_password) {$error['oldPassword'] = 'Votre mot de passe ne correspond pas';}
      // si aucune erreur
      if (count($error) == 0) {
        // on crypte le nouveau mot de passe
        $password1 = $_POST['newPassword'];
        $auth = new AuthentificationModel();
        $password = $auth->hashPassword($password1);
        // on génere un nouveau token
        $new_token1 = new StringUtils();
        $new_token = $new_token1->randomString();
        // on met a jour le nouveau mot de passe dans la base de donnée
        $users = new UserModel();
        $users->update(array(
                'password' => $password,
                'token' => $new_token,
                'modified_at' => date('Y-m-d H:i:s'),
            ), $loggedUser['id']
        );
        // on raffraichit les infos utilisateur et on affiche le profil
        $avatars = new AvatarModel();
        $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
        $authentificationModel = new AuthentificationModel();
        $authentificationModel->refreshUser();
        $this->show('user/profil', ['img_path'=> $avatar['img_path'],]);
      }
      else {
       // on raffraichit les infos utilisateur et on affiche le profil en envoyant les erreurs
       $avatars = new AvatarModel();
       $avatar = $avatars-> getUserWithAvatar($loggedUser['avatar_id']);
       $authentificationModel = new AuthentificationModel();
       $authentificationModel->refreshUser();
       $this->show('user/profil', ['img_path'=> $avatar['img_path'], 'error'=> $error]);
     }
    }
  }
}
