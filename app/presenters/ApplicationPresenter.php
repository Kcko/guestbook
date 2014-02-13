<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook;

use Guestbook\Components\TCreateComponentLoginForm;


/**
 * Aplikační presenter.
 */
class ApplicationPresenter extends BasePresenter
{
	
	/*
	 * Vytvoří komponentu loginForm
	 */
	use TCreateComponentLoginForm;
	
	
	/**
	 * Přihlašovací stránka.
	 */
	public function renderLogin()
	{
	}

}
