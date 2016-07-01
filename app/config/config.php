<?php

use Phalcon\Config;
use Phalcon\Logger;

if(!defined('APP_PATH')) define('APP_PATH', 'C:/www/michaelserpaauto.com/OfiGest');
if(!defined('APP_URL'))  define('APP_URL',  'www.michaelserpaauto.com/ofigest');

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'iloveluciana',
        'dbname'      => 'OfiGest',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'formsDir'       => APP_PATH . '/app/forms/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'baseUri'        => '/OfiGest/',
        //daqui para baixo é tudo do Vokuro
        'publicUrl' => APP_URL,
        'cryptSalt' => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D',
    ),
	//https://github.com/phalcon-ext/mailer
    'mail' => array(
	        //SMTP - Using GMAIL error ...Username and Password not accepted... or password incorrect, use password token
            'driver'     => 'smtp',
            'host'       => 'mail.lavaimagem.net',
            'port'       => 465,    //587
            'encryption' => 'ssl',  //tls
            'username'   => 'josedomingos@lavaimagem.net',
            'password'   => 'i6*uWx74',
            'from'       => array(
                //TODO: Falta enviar o email, criar o AppToken e por na pass para gmail
                'email' => 'josedomingos@lavaimagem.net',
                'name'  => 'OfiGest de Michael Serpa'
            ),
            'mailViewDir'   => APP_PATH . '/app/views/layouts/'
        /*
        //Sendmail
            'driver'     => 'sendmail',
            'sendmail'   => '/usr/sbin/sendmail -bs',
            'from'       => array(
                'email' => 'example@gmail.com',
                'name'  => 'YOUR FROM NAME'
            )
        //PHP Mail
            'driver'     => 'mail',
            'from'       => array(
                'email' => 'example@gmail.com',
                'name'  => 'YOUR FROM NAME'
            )
        */
    ),
    'logger' => array(
        'path'     => APP_PATH . '/logs/',
        'format'   => '%date% [%type%] %message%',
        'date'     => 'D j H:i:s',
        'logLevel' => Logger::DEBUG,
        'filename' => 'application.log',
    )
));
