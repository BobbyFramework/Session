<?php

namespace BobbyFramework\Core\Components\Session;

use BobbyFramework\Core\Components\Session\Flash\Flash;
use BobbyFramework\Core\Components\Session\Flash\FlashInterface;

/**
 * Class Session
 * @package BobbyFramework\Core\Components\Session
 */
class Session implements SessionInterface, \IteratorAggregate, \Countable, \ArrayAccess
{
    private $_flash;

    private $_keyUserData = 'user_data';

    /**
     * Session constructor.
     * @param FlashInterface|null $flash
     */
    public function __construct(FlashInterface $flash = null)
    {
        $this->_flash = $flash ?: new Flash();
    }

    public function getId()
    {
        return session_id();
    }

    public function setId($value)
    {
        session_id($value);
    }

    public function getName()
    {
        return session_name();
    }

    public function setName($value)
    {
        session_name($value);
    }

    public function destroy()
    {
        session_destroy();
    }

    public function getIterator()
    {
        return new SessionIterator;
    }

    public function getFlash()
    {
        return $this->_flash;
    }

    public function offsetExists($offset)
    {
        return isset($_SESSION[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($_SESSION[$offset]) ? $_SESSION[$offset] : null;
    }

    public function offsetSet($offset, $item)
    {
        $_SESSION[$offset] = $item;
    }

    public function offsetUnset($offset)
    {
        unset($_SESSION[$offset]);
    }

    public function count()
    {
        return $this->getCount();
    }

    public function getCount()
    {
        return count($_SESSION);
    }

    public function setAttribute($attr, $value)
    {
        $_SESSION[$attr] = $value;
    }

    public function getAttribute($attr, $defaultValue = null)
    {
        return isset($_SESSION[$attr]) ? $_SESSION[$attr] : $defaultValue;
    }

    public function setAttributeUserData($attr, $value)
    {
        $_SESSION[$this->_keyUserData][$attr] = $value;
    }

    public function getAttributeUserData($attr, $defaultValue = null)
    {
        return isset($_SESSION[$this->_keyUserData][$attr]) ? $_SESSION[$this->_keyUserData][$attr] : $defaultValue;
    }

    public function destroyUserData()
    {
        unset($_SESSION[$this->_keyUserData]);
    }

    public function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public function removeAll()
    {
        foreach (array_keys($_SESSION) as $key) {
            $this->remove($key);
        }
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function removeUserData($key)
    {
        unset($_SESSION[$this->_keyUserData][$key]);
    }
}