<?php

/**
 * GUESTBOOK
 * Zkušební projekt v Nette a Dibi
 * 
 * @author Miroslav Mrázek <miroslav.mrazek@gmail.com>
 */

namespace Guestbook\Components;

use Nette\Application\UI\Form,
	Nette\Security\AuthenticationException;


/**
 * Komponenta přihlašovacího formuláře.
 */
class LoginForm extends BaseControl
{


	/**
	 * Defaultní pohled.
	 */
	public function render()
	{
		$this->template->setFile(__DIR__ . '/loginForm.latte');
		$this->template->render();
	}


	/**
	 * LoginForm factory.
	 * @return Form
	 */
	protected function createComponentLoginForm()
	{
		$form = new Form;
		$form->addText('username', 'Jméno:')
			->setRequired('Vyplňte, prosím, přihlašovací jméno.');
		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte, prosím, heslo.');
		$form->addCheckbox('remember', 'Chci zůstat přihlášený');
		$form->addSubmit('ok', 'Přihlásit se');
		$form->onSuccess[] = $this->success;
		return $form;
	}


	/**
	 * Zpracování formuláře.
	 * @param Form $form
	 */
	public function success($form)
	{
		$values = $form->getValues();

		if ($values->remember) {
			$this->presenter->getUser()->setExpiration('+ 14 days', FALSE);
		}
		else {
			$this->presenter->getUser()->setExpiration('+ 20 minutes', TRUE);
		}

		try {
			$this->presenter->getUser()->login($values->username, $values->password);
		}
		catch (AuthenticationException $e) {
			$form->addError($e->getMessage());
			$this->presenter->flashMessage('Přihlášení selhalo. ' . $e->getMessage(), 'danger');
			return;
		}
		$this->presenter->flashMessage('Přihlášení proběhlo úspěšně.', 'info');
		$this->presenter->redirect('Homepage:guestbook');
	}

}
