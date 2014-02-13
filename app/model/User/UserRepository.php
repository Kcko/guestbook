<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook\Model;


/**
 * Repozitář pro správu uživatelů.
 */
class UserRepository extends Repository
{
	
	const
		TABLE_NAME = 'user',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'username',
		COLUMN_PASSWORD = 'password',
		COLUMN_ROLE = 'role',
		PASSWORD_MAX_LENGTH = 4096;
	
	
	/**
	 * Vyhledá uživatele podle přihlašovacího jména.
	 * @param string $username
	 */
	public function findByUsername($username)
	{
		return $this->connection->select('*')
				->from(self::TABLE_NAME)
				->where([self::COLUMN_NAME => $username])
				->fetch();
	}

}