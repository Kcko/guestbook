<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook\Model;

use Nette\Object,
	DibiConnection;


/**
 * Abstraktní předek repozitářů.
 */
abstract class Repository extends Object
{

	/** @var DibiConnection */
	protected $connection;


	/**
	 * Konstruktor.
	 */
	public function __construct(DibiConnection $connection)
	{
		$this->connection = $connection;
	}
	
}