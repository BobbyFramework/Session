<?php

namespace BobbyFramework\Session;

/**
 * Interface SessionAdapterInterface
 * @package BobbyFramework\Session
 */
interface SessionAdapterInterface
{
    /**
     * @param $attr
     * @param $value
     * @return mixed
     */
    public function set($attr, $value);

    /**
     * @param $attr
     * @param null $defaultValue
     * @return mixed
     */
    public function get($attr, $defaultValue = null);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $value
     * @return mixed
     */
    public function setId($value);

    /**
     * @param $attr
     * @return mixed
     */
    public function remove($attr);

    /**
     * @return mixed
     */
    public function removeAll();

    /**
     * @return mixed
     */
    public function destroy();

    /**
     * @param $key
     * @return mixed
     */
    public function has($key);

    /**
     * @return mixed
     */
    public function start();

    /**
     * @return mixed
     */
    public function stop();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function isStarted();
}
