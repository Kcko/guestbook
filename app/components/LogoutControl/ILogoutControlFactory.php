<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;


/**
 * Rozhranní pro generovanou továrničku.
 */
interface ILogoutControlFactory
{

	/** @return LogoutControl */
	function create();

}
