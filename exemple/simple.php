<?php

define('APP_PATH',realpath('..'));

require APP_PATH . '/vendor/autoload.php';

$session = new \BobbyFramework\Core\Components\Session\Session();

$session->setAttribute('test',"jksQKJSKqlslqs");

echo $session->getAttribute('test');