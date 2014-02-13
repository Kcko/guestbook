<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook\Model;

use Nette\Object,
	Nette\Security\IAuthenticator,
	Nette\Security\AuthenticationException,
	Nette\Security\Identity,
	Nette\Utils\Strings;


/**
 * Autentikátor.
 */
class Authenticator extends Object implements IAuthenticator
{
	
	/**
	 * @var UserRepository
	 */
	protected $users;


	/**
	 * Konstruktor
	 */
	public function __construct(UserRepository $users)
	{
		$this->users = $users;
	}


	/**
	 * Provede ověření uživatele.
	 * @return Identity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		$row = $this->users->findByUsername($username);

		if (!$row) {
			throw new AuthenticationException('Neznámý uživatel.', self::IDENTITY_NOT_FOUND);
		}

		if ($row[UserRepository::COLUMN_PASSWORD] !== $this->calculateHash($password, $row[UserRepository::COLUMN_PASSWORD])) {
			throw new AuthenticationException('Špatné heslo.', self::INVALID_CREDENTIAL);
		}

		$arr = $row->toArray();
		unset($arr[UserRepository::COLUMN_PASSWORD]);
		return new Identity($row[UserRepository::COLUMN_ID], $row[UserRepository::COLUMN_ROLE], $arr);
	}


	/**
	 * Spočítá hash hesla.
	 * @todo Vyčlenit do samostatné třídy.
	 * @param  string
	 * @return string
	 */
	public static function calculateHash($password, $salt = NULL)
	{
		if ($password === Strings::upper($password)) { // perhaps caps lock is on
			$password = Strings::lower($password);
		}
		$password = substr($password, 0, UserRepository::PASSWORD_MAX_LENGTH);
		return crypt($password, $salt ?: '$2a$07$' . Strings::random(22));
	}

}
