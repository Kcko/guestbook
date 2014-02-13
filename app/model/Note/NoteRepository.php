<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook\Model;

use DateTime;


/**
 * Repozitář pro správu diskuzních příspěvků.
 */
class NoteRepository extends Repository
{
	
	/**
	 * Vyhledá všechny příspěvky napříč vlákny.
	 * @param mixed $orderBy Sloupec, nebo pole ['column' => 'desc']
	 */
	public function findAll($orderBy = 'time')
	{
		return $this->connection->select('*')
				->from('note')
				->orderBy($orderBy)
				->fetchAll();
	}
	

	/**
	 * Vyhledá příspěvky podle vlákna.
	 * @param string $thread
	 * @param mixed $orderBy Sloupec, nebo pole ['column' => 'desc']
	 */
	public function findByThread($thread, $orderBy = 'time')
	{
		return $this->connection->select('*')
				->from('note')
				->where(['thread' => $thread])
				->orderBy($orderBy)
				->fetchAll();
	}
	
	
	/**
	 * Vloží nový příspěvek
	 * @param array $data
	 */
	public function insert($data)
	{
		$data['time'] = new DateTime;
		$this->connection->insert('note', $data)->execute();
	}
	
	
	/**
	 * Smaže příspěvek
	 * @param int $id
	 */
	public function delete($id)
	{
		$this->connection->delete('note')->where(['id' => $id])->execute();
	}

}