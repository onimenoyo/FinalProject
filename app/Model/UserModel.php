<?php

namespace Model;

use W\Model\UsersModel as ModelUsers;
use W\Model\ConnectionModel;

class UserModel extends ModelUsers
{
  public function getUserByToken($token)
	{

		$app = getApp();

		$sql = 'SELECT * FROM ' . $this->table .
			   ' WHERE ' . $app->getConfig('security_token_property') . ' = :token' . ' LIMIT 1';

		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
		$sth->bindValue(':token', $token);

		if($sth->execute()){
			$foundUser = $sth->fetch();
			if($foundUser){
				return $foundUser;
			}
		}
  }
}
