<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;


/**
 * Trait, který injectuje továrničku do presenteru a vytvoří komponentu logoutControl.
 */
trait TCreateComponentLogoutControl
{

	/**
	 * @var ILogoutControlFactory
	 */
	protected $logoutControlFactory;
	
	
	/**
	 * Injector.
	 */
	public function injectLogoutControlFactory(ILogoutControlFactory $logoutControlFactory)
	{
		$this->logoutControlFactory = $logoutControlFactory;
	}

	
	/**
	 * Vytvoří komponentu logoutControl
	 * @return LogoutControl
	 */
	protected function createComponentLogoutControl()
	{
		return $this->logoutControlFactory->create();
	}

}
