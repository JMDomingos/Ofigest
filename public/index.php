<?php

error_reporting(E_ALL^E_NOTICE);

date_default_timezone_set('Atlantic/Azores'); //TODO: Estará certo??
//array(,'pt_PT.UTF-8','pt_PT@euro','pt_PT','Portuguese_Standard')
setlocale(LC_ALL, 'pt_PT.utf8'); //FIXME: Está no locale -a mas não dá

define('APP_PATH', realpath('..'));

try {
	//Foi adicionado do Vokuro por causa do APP_DIR	no invo ser APP_PATH
	/**
     * Define some useful constants
     */
	//convém listar todas as constantes para este BASE_DIR não dar problemas
    define('BASE_DIR', dirname(__DIR__));
    define('APP_DIR', BASE_DIR . '/app');    
	
    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
	//echo nl2br(htmlentities($e->getTraceAsString()));
}
