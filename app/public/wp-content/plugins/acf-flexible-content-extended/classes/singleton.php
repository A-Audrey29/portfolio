<?php

namespace ACF_FCE;

/**
 * Singleton base class for having singleton implementation
 * This allows you to have only one instance of the needed object
 * You can get the instance with
 *     $class = My_Class::get_instance();
 *
 * /!\ The get_instance method have to be implemented !
 *
 * Class Singleton
 * @package ACF_FCE
 */
trait Singleton {

	/**
	 * @var self
	 */
	protected static $instance;

	/**
	 * @return self
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new static;
		}

		return self::$instance;
	}

	/**
	 * Constructor protected from the outside
	 */
	private function __construct() {
		$this->init();
	}

	/**
	 * Add init function by default
	 * Implement this method in your child class
	 * If you want to have actions send at construct
	 */
	protected function init() {}

	/**
	 * prevent the instance from being cloned
	 *
	 * @return void
	 */
	private function __clone() {}

	/**
	 * prevent from being unserialized
	 *
	 * @return void
	 */
	public function __wakeup() {}
}