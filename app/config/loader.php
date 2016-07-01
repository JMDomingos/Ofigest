<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
		$config->application->controllersDir,
		$config->application->modelsDir,
		$config->application->formsDir,
		$config->application->viewsDir,
		$config->application->libraryDir,
		$config->application->pluginsDir,
		$config->application->cacheDir,
		$config->application->migrationsDir
    )
)->register();

//$loader->registerNamespaces(
	//array(
		//'Ofigest\Models'      => $config->application->modelsDir,
		//'Ofigest\Controllers' => $config->application->controllersDir,
		//'Ofigest\Forms'       => $config->application->formsDir,
		//'Ofigest'             => $config->application->libraryDir
        //,
        //'Ofigest\Acl'           => __DIR__ . '/../library/Acl/Acl.php',
        //'Ofigest\Auth'          => __DIR__ . '/../library/Auth/Auth.php',
        //'Ofigest\Mail'          => __DIR__ . '/../library/Mail/Mail.php'
	//)
//)->register();

//Adicionado do Vokuro
// Use composer autoloader to load vendor classes
require_once __DIR__ . '/../../vendor/autoload.php';
