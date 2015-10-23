<?php
require_once('common/config.php');
require_once('Autoloader.php');

/**
 * Checks if we have something to include and include it
 *
 * @param $class_name
 *
 * @throws Exception
 */
function __autoload($class_name) {
	$classes_loader = new Autoloader($class_name);
	$classes_loader->run();
}

