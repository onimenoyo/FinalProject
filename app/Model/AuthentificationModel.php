<?php

namespace Model;

use W\Model\UsersModel;
use W\Security\AuthentificationModel as Authent;

class AuthentificationModel extends Authent
{
  public function isValidPassword($usernameOrEmail, $plainPassword)
  {

    $app = getApp();

    $usersModel = new UsersModel();
    $usernameOrEmail = strip_tags(trim($usernameOrEmail));
    $foundUser = $usersModel->getUserByUsernameOrEmail($usernameOrEmail);
    if(password_verify($plainPassword, $foundUser[$app->getConfig('security_password_property')])){
      return (int) $foundUser[$app->getConfig('security_id_property')];
    }

    return 0;
  }
}
