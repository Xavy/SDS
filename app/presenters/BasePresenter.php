<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use Nette\Application\Presenter;
use Nette\Environment;
use Nette\Application\AppForm;
use Nette\Forms\Form;
use Nette\Security\AuthenticationException;



/**
 * Base class for all application presenters.
 *
 * @author     John Doe
 * @package    MyApplication
 */
abstract class BasePresenter extends Presenter
{
    /**
     * Login form component factory.
     * @return mixed
     */
    protected function createComponentLoginForm()
    {
        $form = new \Nette\Application\AppForm;
        $form->addText('username','Login')
             ->addRule(\Nette\Forms\Form::FILLED, 'Musíte vyplnit text!');
        $form->addPassword('password','Heslo')
             ->addRule(\Nette\Forms\Form::FILLED, 'Musíte vyplnit heslo!');
        $form->addSubmit('login', 'Přihlásit');
        $form->addSubmit('back', 'Zpět')->setValidationScope(NULL);
        $form->addCheckbox('remember', 'Pamatovat');
        $form['username']->getControlPrototype()->class('myinputstyle');
        $form['password']->getControlPrototype()->class('myinputstyle');
        $form['login']->getControlPrototype()->class('mylabelstyle');
        $form['back']->getControlPrototype()->class('mylabelstyle');
        $form->getElementPrototype()->class('auth_table');
        
        $presenter = $this;
        $form->onSubmit[] = function (AppForm $form) use ($presenter) {
            try {
                $values = $form->values;
                if ($values['remember']) {
                    Environment::getUser()->setExpiration('+ 14 days', FALSE);
                } else {
                    Environment::getUser()->setExpiration('+ 20 minutes', TRUE);
                }
                Environment::getUser()->login($values['username'], $values['password']);
                if(!empty($values["backlink"]))
                    $presenter->getApplication()->restoreRequest($values["backlink"]);
                else
                    $presenter->redirect('Eventlist:show');

            } catch (AuthenticationException $e) {
                $presenter->flashMessage($e->getMessage());
            }
        };

        return $form;
    }
}
