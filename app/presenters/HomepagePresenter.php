<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook;

use Guestbook\Components\DiscussionControl,
	Guestbook\Components\TInjectDiscussionControlFactory;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	
	/*
	 * Inject DiscussionControlFactory.
	 */
	use TInjectDiscussionControlFactory;
	

	/**
	 * Hlavní stránka.
	 */
	public function renderGuestbook()
	{
		
	}
	
	
	/**
	 * Hlavní stránka.
	 */
	public function renderAbout()
	{
		
	}
	
	
	/**
	 * Továrnička na komponentu guestbook
	 * @return DiscussionControl
	 */
	public function createComponentGuestbook()
	{
		$isAdmin = in_array('admin', $this->presenter->user->roles);
		return $this->discussionControlFactory->create('guestbook', $isAdmin);
	}
	
	
	/**
	 * Továrnička na komponentu aboutDiscussion
	 * @return DiscussionControl
	 */
	public function createComponentAboutDiscussion()
	{
		$isAdmin = in_array('admin', $this->presenter->user->roles);
		return $this->discussionControlFactory->create('about', $isAdmin);
	}

}
