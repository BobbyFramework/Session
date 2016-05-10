<?php

define('APP_PATH',realpath('..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Core\Components\Session\Adapter\Native;
use BobbyFramework\Core\Components\Session\Session ;

$sessionAdapter = new Native();
$session = new Session($sessionAdapter);

$session->set('test',"hello world");

echo $session->get('test');
