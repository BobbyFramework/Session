<?php
namespace BobbyFramework\Core\Components\Session\Adapter;

use BobbyFramework\Core\Components\Session\SessionAdapter;
use BobbyFramework\Core\Components\Session\SessionAdapterInterface;

/**
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 10/05/2016
 * Time: 12:57
 */
class Native extends SessionAdapter implements SessionAdapterInterface, \Countable, \ArrayAccess, \IteratorAggregate
{

    public function setName($name)
    {
        parent::setName($name);
        session_name($name);
    }

    public function getName()
    {
        return parent::getName();
    }

    public function isStarted()
    {
        return $this->_isStarted;
    }

    public function exist()
    {
        if (true === $this->isStarted()) {
            return true;
        }

        if (session_status() === PHP_SESSION_ACTIVE) {
            throw new \RuntimeException('Failed to start the session: already started by PHP.');
        }

        if (ini_get('session.use_cookies') && headers_sent($file, $line)) {
            throw new \RuntimeException(sprintf('Failed to start the session because headers have already been sent by "%s" at line %d.', $file, $line));
        }

        return false;
    }

    public function start()
    {
        session_start();
    }

    public function stop()
    {
        session_write_close();
    }

    public function getId()
    {
        return session_id();
    }

    public function setId($value)
    {
        session_id($value);
    }

    public function set($attr, $value)
    {
        $this->offsetSet($attr, $value);
    }

    public function get($attr, $defaultValue = null)
    {
        return $this->offsetGet($attr, $defaultValue);
    }

    public function getIterator()
    {
        return new SessionIterator;
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

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function has($key)
    {
        return $this->offsetExists($key);
    }

    public function removeAll()
    {
        foreach (array_keys($_SESSION) as $key) {
            $this->remove($key);
        }
    }

    public function destroy()
    {
        $_SESSION = array();
        session_destroy();
    }

    public function setSavePath($path)
    {
        if (is_dir($path)) {
            session_save_path($path);
        } else {
            throw new InvalidParamException("Session save path is not a valid directory: $path");
        }
    }
}