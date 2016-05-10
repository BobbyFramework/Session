<?php

define('APP_PATH',realpath('..'));

require APP_PATH . '/vendor/autoload.php';


$sessionAdapter = new \BobbyFramework\Core\Components\Session\Adapter\Native();
$session = new \BobbyFramework\Core\Components\Session\Session($sessionAdapter);

$session->set('test',"jksQKJSKqlslqs");

echo $session->get('test');