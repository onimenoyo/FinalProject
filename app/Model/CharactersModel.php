<?php
namespace Model;
use W\Model\Model;
use W\Model\ConnectionModel;

class CharactersModel extends Model
{
  public function findWithUserId($user_id)
  {
    if (!is_numeric($user_id)){
      return false;
    }

    $sql = 'SELECT * FROM '.$this->table.' WHERE user_id = :user_id ORDER BY id DESC LIMIT 1';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':user_id', $user_id);
    $sth->execute();
    return $sth->fetch();
  }
}
