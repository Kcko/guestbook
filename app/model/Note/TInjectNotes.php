<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook\Model;


/**
 * Trait pro předávání NoteRepository do presenterů.
 */
trait TInjectNotes
{
	
	/** @var NoteRepository */
	protected $notes;

	
	/**
	 * Injector.
	 */
	public function injectNoteRepository(NoteRepository $notes)
	{
		$this->notes = $notes;
	}
	
}