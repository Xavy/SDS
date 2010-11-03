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

    public static function findAllBySpec($den,$specID = null, $auth = null, $rok = null, $semestr = null)
    {
      if($specID != null)
      {
            return Event::findAll()->
                where("DATE_FORMAT(event_date,'%Y-%m-%d') = %d AND sub_id IN (SELECT sub_id FROM `contains` WHERE spec_id = %i)",$den,$specID);
      }
            return Event::findAll()->
                where("DATE_FORMAT(event_date,'%Y-%m-%d') = %d",$den);
    }

    public static function findAllByWeek($from,$to)
    {
        return dibi::getConnection("ormion")
            ->query("SELECT * FROM event
                    WHERE DATE_FORMAT(event_date,'%Y-%m-%d') BETWEEN %d AND %d",
                    $from, $to);
    }
    
     public static function findAllByDay($day)
    {
        return dibi::getConnection("ormion")
            ->query("SELECT * FROM event
                    WHERE DATE_FORMAT(event_date,'%Y-%m-%d') = %d",
                    $day);
    }



    

}
