<?php

define('APP_PATH',realpath('..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Session\Adapter\Native;
use BobbyFramework\Session\Session ;

$sessionAdapter = new Native();
$session = new Session($sessionAdapter);

$session->set('test',"hello world");

echo $session->get('test');
