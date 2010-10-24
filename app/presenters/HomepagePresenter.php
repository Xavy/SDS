<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use \Event;
use \Auth_users;
use \UsersModel;
use Nette\Environment;

/**
 * Homepage presenter.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class HomepagePresenter extends BasePresenter
{

    public function actionDefault()
    {
       $obor = Auth_users::find(4);
       $user = Environment::getUser();
       if ($user->isLoggedIn()) {
       Nette\Debug::barDump("prihlasen");
       Nette\Debug::barDump($user->getIdentity());
       } else {
       Nette\Debug::barDump("neprilasen");
       }
    }

}
