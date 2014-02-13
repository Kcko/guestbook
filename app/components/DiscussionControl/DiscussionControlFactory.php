<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;

use Guestbook\Model\NoteRepository;

/**
 * Továrnička (kvůli parametru není generovaná).
 */
class DiscussionControlFactory
{

	/** @var NoteRepository */
	protected $notes;


	public function __construct(NoteRepository $notes)
	{
		$this->notes = $notes;
	}
	

	/**
	 * @return DiscussionControl
	 */
	public function create($thread = '', $isEditable = FALSE)
	{
		$discussion = new DiscussionControl($this->notes, $thread);
		$discussion->setEditable($isEditable);
		return $discussion;
	}

}