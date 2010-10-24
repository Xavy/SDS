<?php
use Ormion\Record;

/**
 * Event model.
 *
 * @author     Tomáš Penc
 * @package    Models
 *
 * @table event
 * @hasOne(name = Subject, referencedEntity = Subject, column = sub_id)
 * @hasOne(name = Auth_users, referencedEntity = Auth_users, column = user_id)
 */ 
class Event extends Record
{
    const STUDENT = "student";
    const UCITEL = "ucitel";
    const ADMIN = "admin";

    /**
     * Vraci vsechny udalosti podle oboru.
     *
     * @param int $specId
     * @param string $auth
     * @return DibiResult
     */
    public static function findAllBySpec($specId, $auth = null, $rok = null, $semestr = null)
    {
       return dibi::getConnection("ormion")
            ->query("SELECT * FROM event
                    WHERE sub_id IN (SELECT sub_id FROM `contains` WHERE spec_id = %i)",
                    $specId);
    }

    

}
