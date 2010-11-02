<?php
use Ormion\Record;

/**
 * Specialization model.
 *
 * @table specialization
 * @manyToMany(name = Subject, referencedEntity = Subject, connectingTable = contains, referencedKey = sub_id, localKey = spec_id)
 */
class Specialization extends Record
{
    /**
    * Performs an findAllSubject
    * @param  int
    * @return array
    * @throws AuthenticationException
    */
    public static function findAllSubject($form)
    {
        /*
        $predmety = array();
        $specname = $form["obor"]->getValue();
        $year = $form["rok"]->getValue();
        foreach(Specialization::findById($specname)->Subject as $sub)
        {
            $predmety[$sub->id]= $sub->name;
        }

        return $predmety;
         */
        $specId = $form["obor"]->getValue();
        $year = $form["rok"]->getValue();
        $sem = $form["semestr"]->getValue();
         Nette\Debug::barDump($sem);
        return dibi::getConnection("ormion")
            ->query("SELECT * FROM subject
                    WHERE id IN (SELECT sub_id FROM `contains` WHERE spec_id=%i AND class=%i AND semestr=%s)",
                    $specId,$year,$sem)->fetchPairs("id", "name");
    }

      /**
    * Performs an countYear
    * @param  int
    * @return array
    * @throws AuthenticationException
    */
    public static function countYear($form)
    {
        $roky = array();
        $specname = $form["obor"]->getValue();
        $roku = Specialization::findById($specname)->years;
        for($i=1;$i<=$roku;$i++)
        {
            $roky[$i]= $i;
        }
        return $roky;
    }
    
}