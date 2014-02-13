<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook;

use Nette\Application\UI\Presenter,
	Guestbook\Components\TCreateComponentLogoutControl;


/**
 * Společný předek všech aplikačních presenterů.
 */
abstract class BasePresenter extends Presenter
{
	
	/*
	 * Vytvoří komponentu logoutControl
	 */
	use TCreateComponentLogoutControl;
	

	public function beforeRender()
	{
		parent::beforeRender();
		
		# Jen pro potřeby zvýrazňování aktuální stránky v @layout.
		# @todo: navigaci vyřešit čistěji a tohle pak smazat
		$this->template->page = $this->name . ":" . $this->action;
	}


}
