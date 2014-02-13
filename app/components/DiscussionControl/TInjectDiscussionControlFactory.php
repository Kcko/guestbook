<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;


/**
 * Trait, který injectuje továrničku do presenteru.
 */
trait TInjectDiscussionControlFactory
{

	/**
	 * @var DiscussionControlFactory
	 */
	protected $discussionControlFactory;
	
	
	/**
	 * Injector.
	 */
	public function injectDiscussionControlFactory(DiscussionControlFactory $discussionControlFactory)
	{
		$this->discussionControlFactory = $discussionControlFactory;
	}

}
