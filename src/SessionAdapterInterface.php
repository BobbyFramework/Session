<?php
/**
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 10/05/2016
 * Time: 12:55
 */
namespace BobbyFramework\Core\Components\Session;

interface SessionAdapterInterface
{
    public function set($attr, $value);

    public function get($attr, $defaultValue = null);

    public function getId();

    public function setId($value);

    public function remove($attr);

    public function removeAll();

    public function destroy();

    public function has($key);

    public function start();

    public function stop();

    public function setName($name);

    public function getName();

    public function isStarted();
}