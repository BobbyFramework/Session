<?php

define('APP_PATH',realpath('..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Session\SessionAdapterFactory;
use BobbyFramework\Session\Session ;

$session = new Session(SessionAdapterFactory::build('Native'));

$session->set('test',"hello world");

echo $session->get('test');
