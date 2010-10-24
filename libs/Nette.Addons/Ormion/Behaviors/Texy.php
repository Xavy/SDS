<?php

namespace Ormion\Behavior;

use Nette\Environment;
use Ormion\IRecord;

/**
 * Cached Texy
 *
 * @author Jan Marek
 * @license MIT
 */
class Texy extends Nette\Object implements IBehavior
{
	/** @var array */
	private static $texyObjects;

	/** @var string */
	private $source;

	/** @var string */
	private $name;

	/** @var string */
	private $texyClass;



	/**
	 * Constructor
	 * @param string name of field with generated html
	 * @param string name of field with Texy source
	 * @param string Texy class name
	 */
	public function __construct($name, $source, $texyClass = "Texy")
	{
		$this->name = $name;
		$this->source = $source;
		$this->texyClass = $texyClass;
	}



	/**
	 * Setup behavior
	 * @param IRecord record
	 */
	public function setUp(IRecord $record)
	{
		$record->registerGetter($this->name, array($this, "getHtml"));
		$record->onBeforeUpdate[] = array($this, "clearCacheIfModified");
		$record->onAfterDelete[] = array($this, "clearCache");
	}



	/**
	 * Get Texy object
	 * @param string texyClass
	 * @return Texy
	 */
	private function getTexy($texyClass)
	{
		if (empty(self::$texyObjects[$texyClass])) {
			self::$texyObjects[$texyClass] = new $texyClass;
		}

		return self::$texyObjects[$texyClass];
	}



	/**
	 * Get html generated by Texy
	 * @param IRecord record
	 * @return string
	 */
	public function getHtml(IRecord $record)
	{
		$cache = Environment::getCache(__NAMESPACE__ . "-" . __CLASS__ . "-" . get_class($record) . "-" . $this->name);
		$key = $record->getPrimary();

		if (empty($cache[$key])) {
			$texy = $this->getTexy($this->texyClass);
			$cache[$key] = $texy->process($record->{$this->source});
		}

		return $cache[$key];
	}



	/**
	 * Remove cached html from cache
	 * @param IRecord record
	 */
	public function clearCache(IRecord $record)
	{
		$cache = Environment::getCache(__NAMESPACE__ . "-" . __CLASS__ . "-" . get_class($record) . "-" . $this->name);
		$key = $record->getPrimary();
		unset($cache[$key]);
	}



	/**
	 * Remove cached html from cache if source is modified
	 * @param IRecord record
	 */
	public function clearCacheIfModified(IRecord $record)
	{
		if ($record->isValueModified($this->source)) {
			$this->clearCache($record);
		}
	}

}