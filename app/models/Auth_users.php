<?php
use Ormion\Record;

/**
 * Auth_users model.
 *
 * @table auth_users
 * @manyToMany(name = Specialization, referencedEntity = Specialization, connectingTable = visit, referencedKey = spec_id, localKey = user_id)
 */
class Auth_users extends Record
{
    /**
    * Performs an findAllSpec
    * @param  int
    * @return array
    * @throws AuthenticationException
    */
    public static function findAllSpec($userId)
    {
        $obory = array();
        foreach(Auth_users::find($userId)->Specialization as $spec)
        {
            $obory[$spec->id]= $spec->name;
        }
        return $obory;
    }
    
}