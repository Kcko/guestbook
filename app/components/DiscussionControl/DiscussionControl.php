<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */


namespace Guestbook\Components;

use Guestbook\Model\NoteRepository,
	Nette\Application\UI\Form;


/**
 * Komponenta discussionControl
 */
class DiscussionControl extends BaseControl
{
	
	/** @var NoteRepository */
	protected $notes;
	
	/** @var string */
	protected $thread;
	
	/** @var boolean */
	protected $isEditable;
	

	/**
	 * @param NoteRepository $notes
	 * @param string         $thread
	 */
	public function __construct(NoteRepository $notes, $thread)
	{
		parent::__construct();

		$this->notes = $notes;
		$this->thread = $thread;
	}
	
	
	/**
	 * Nastaví možnost editoat příspěvky
	 * @param boolean $isEditable
	 */
	public function setEditable($isEditable)
	{
		$this->isEditable = $isEditable;
	}

	
	
	/**
	 * Odstraní přípěvek.
	 * @param int $id
	 */
	public function handleDelete($id)
	{
		if(!$this->isEditable) {
			$this->presenter->flashMessage('Nemáte oprávnění mazat příspěvky!', 'danger');
			return;
		}
		
		$this->notes->delete($id);
		
		$this->presenter->flashMessage('Příspěvek byl odstraněn.', 'success');
		if ($this->presenter->isAjax()) {
			$this->redrawControl('notes');
			$this->presenter->redrawControl('flash');
		}
		else {
			$this->presenter->redirect('this');
		}
	}



	/**
	 * Defaultní pohled.
	 */
	public function render()
	{
		$this->template->isEditable = $this->isEditable;
		$this->template->notes = $this->notes->findByThread($this->thread);
		$this->template->setFile(__DIR__ . '/discussionControl.latte');
		$this->template->render();
	}
	
	
	/**
	 * NoteForm factory.
	 * @return Form
	 */
	protected function createComponentNoteForm()
	{
		$form = new Form;
		$form->addText('author', 'Jméno:')
			->setRequired('Vyplňte, prosím, Vaše jméno.');
		$form->addTextArea('text', 'Text příspěvku:')
			->setRequired('Vyplňte, prosím, příspěvek.');
		$form->addSubmit('ok', 'Odeslat');
		$form->onSuccess[] = $this->success;
		
		if($this->presenter->user->isLoggedIn()) {
			$form->setDefaults(['author' => $this->presenter->user->identity->nick]);
		}
		return $form;
	}


	/**
	 * Zpracování formuláře.
	 * @param Form $form
	 */
	public function success($form)
	{
		$values = $form->getValues();
		$values['thread'] = $this->thread;
		$this->notes->insert($values);
		
		$this->presenter->flashMessage('Váš příspěvek byl přijat.', 'success');
		if ($this->presenter->isAjax()) {
			if($this->presenter->user->isLoggedIn()) {
				$form->setValues(['author' => $this->presenter->user->identity->nick], TRUE);
			}
			else {
				$form->setValues([], TRUE);
			}
			$this->presenter->redrawControl('flash');
			$this->presenter->redrawControl('content');
		}
		else {
			$this->presenter->redirect('this');
		}
	}

}
