<?php
use Ormion\Record;

/**
 * Event model.
 *
 * @table subject
 @manyToMany(name = Specialization, referencedEntity = Specialization, connectingTable = contains, referencedKey = spec_id, localKey = sub_id)
 */
class Subject extends Record
{
}