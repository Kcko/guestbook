<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;


/**
 * Komponenta logoutControl
 */
class LogoutControl extends BaseControl
{


	/**
	 * Provede odhlášení uživatele.
	 */
	public function handleLogout()
	{
		$this->presenter->getUser()->logout();
		$this->presenter->flashMessage('Byl jste odhlášen.', 'info');
		$this->presenter->redirect('this');
	}


	/**
	 * Defaultní pohled.
	 */
	public function render()
	{
		$this->template->setFile(__DIR__ . '/logoutControl.latte');
		$this->template->render();
	}

}
