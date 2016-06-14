<?php
namespace Model;
use W\Model\Model;
use W\Model\ConnectionModel;

class AvatarModel extends Model
{
  public function getIdByUserId($name)
	{

		$app = getApp();

		$sql = 'SELECT * FROM ' . $this->table .
			   ' WHERE name = :name';

		$dbh = ConnectionModel::getDbh();
		$sth = $dbh->prepare($sql);
		$sth->bindValue(':name', $name);

		if($sth->execute()){
			$foundUser = $sth->fetch();
			if($foundUser){
				return $foundUser;
			}
		}
  }

  public function getUserWithAvatar($id)
  {
    $app = getApp();

    $sql = 'SELECT * FROM ' . $this->table .
			   ' WHERE id = :id';

    $dbh = ConnectionModel::getDbh();
    $sth = $dbh->prepare($sql);
    $sth->bindValue(':id', $id);

    if($sth->execute()){
      $foundUser = $sth->fetch();
      if($foundUser){
        return $foundUser;
      }
    }
  }
}
