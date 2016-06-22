<?php
namespace Model;
use W\Model\Model;
use W\Model\ConnectionModel;

class InventoryModel extends Model
{
  public function findAllWithId($id)
	{
		if (!is_numeric($id)){
			return false;
		}

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE  character_id  = :id ';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}
}
