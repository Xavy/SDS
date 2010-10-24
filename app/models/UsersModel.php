<?php

/**
 * My Application
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use Nette\Object;
use Nette\Security\AuthenticationException;
use \Auth_users;


/**
 * Users authenticator.
 *
 * @author     John Doe
 * @package    MyApplication
 */
class UsersModel extends Object implements Nette\Security\IAuthenticator
{

	/**
	 * Performs an authentication
	 * @param  array
	 * @return IIdentity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		$username = $credentials[self::USERNAME];
		$password = $credentials[self::PASSWORD];
                
                if($this->isEduIdentity($username,$password))
                {
                    $row = dibi::getConnection("ormion")->query('SELECT * FROM auth_users WHERE edu_ident=%s', $username)->fetch();
                    if (!$row)
                    {
                        $user = new Auth_users();
                        $user->date_added = new DateTime;
                        $user->admin = FALSE;
                        $user->edu_ident = $username;
                        $user->save();
                        return new Nette\Security\Identity($user->id);
                    }
                    return new Nette\Security\Identity($row->id);
		}
                throw new AuthenticationException("User '$username' not found.", self::IDENTITY_NOT_FOUND);
		
	}

        /**
	 * Performs an isEduIdentity
	 * @param  string,string
	 * @return bool
	 * @throws AuthenticationException
	 */
        public function isEduIdentity($username, $password)
        {
           return true;
        }
}
