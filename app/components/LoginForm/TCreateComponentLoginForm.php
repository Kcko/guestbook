<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;


/**
 * Trait, který injectuje továrničku do presenteru a vytvoří instanci LoginForm.
 */
trait TCreateComponentLoginForm
{

	/**
	 * @var ILoginFormFactory
	 */
	protected $loginFormFactory;
	
	
	/**
	 * Injector.
	 */
	public function injectLoginFormFactory(ILoginFormFactory $loginFormFactory)
	{
		$this->loginFormFactory = $loginFormFactory;
	}

	
	/**
	 * Vytvoří komponentu loginForm.
	 * @return LoginForm
	 */
	protected function createComponentLoginForm()
	{
		return $this->loginFormFactory->create();
	}

}