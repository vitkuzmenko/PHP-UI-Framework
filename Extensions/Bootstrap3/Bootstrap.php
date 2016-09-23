<?php


define('BOOSTRAP_PATH', realpath(dirname(__FILE__)));

require_once BOOSTRAP_PATH . '/../../Framework/PHPUIFramework.php';

// Autoloader
spl_autoload_register(function ($class) {
	$cleanClass = String::stripNamespaceFromClassName($class);
	$classFile = sprintf('%s.php', realpath(dirname(__FILE__)) . '/' . $cleanClass);
	if (is_file($classFile) && is_readable($classFile)) {
		require_once $classFile;
	}
});