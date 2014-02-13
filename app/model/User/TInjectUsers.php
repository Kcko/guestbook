<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Model;


/**
 * Trait pro předávání UserRepository do presenterů.
 */
trait TInjectUsers
{
	
	/** @var UserRepository */
	protected $users;
	

	/**
	 * Injector.
	 */
	public function injectUserRepository(UserRepository $users)
	{
		$this->users = $users;
	}
	
}