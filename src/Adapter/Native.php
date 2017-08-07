<?php
namespace BobbyFramework\Session\Adapter;

use BobbyFramework\Session\SessionAdapter;
use BobbyFramework\Session\SessionAdapterInterface;

/**
 * Class Native
 * @package BobbyFramework\Session\Adapter
 */
class Native extends SessionAdapter implements SessionAdapterInterface, \Countable, \ArrayAccess, \IteratorAggregate
{
    /**
     * @param string $name
     * @throws \Exception
     */
    public function setName($name)
    {
        parent::setName($name);
        session_name($name);
    }

    /**
     * @return null
     */
    public function getName()
    {
        return parent::getName();
    }

    /**
     * @return bool
     */
    public function isStarted()
    {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
        } else {
            return session_id() === '' ? false : true;
        }
    }

    /**
     * @return bool
     */
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

    /**
     *
     */
    public function start()
    {
        $this->setStarted();
        session_start();
    }

    /**
     *
     */
    public function stop()
    {
        session_write_close();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return session_id();
    }

    /**
     * @param $value
     */
    public function setId($value)
    {
        session_id($value);
    }

    /**
     * @param $offset
     * @param $value
     */
    public function set($offset, $value)
    {
        $this->setStarted();

        $this->offsetSet($offset, $value);
    }

    /**
     * @param $offset
     * @param null $defaultValue
     * @return null
     */
    public function get($offset, $defaultValue = null)
    {
        return isset($_SESSION[$offset]) ? $_SESSION[$offset] : $defaultValue;
    }

    /**
     * @return SessionIterator
     */
    public function getIterator()
    {
        return new SessionIterator;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($_SESSION[$offset]);
    }

    /**
     * @param mixed $offset
     * @return null
     */
    public function offsetGet($offset)
    {
        return isset($_SESSION[$offset]) ? $_SESSION[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $item
     */
    public function offsetSet($offset, $item)
    {
        $_SESSION[$offset] = $item;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($_SESSION[$offset]);
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->getCount();
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($_SESSION);
    }

    /**
     * @param $offset
     */
    public function remove($offset)
    {
        $this->offsetUnset($offset);
    }

    /**
     * @param $offset
     * @return bool
     */
    public function has($offset)
    {
        return $this->offsetExists($offset);
    }

    /**
     *
     */
    public function removeAll()
    {
        foreach (array_keys($_SESSION) as $offset) {
            $this->remove($offset);
        }
    }

    /**
     *
     */
    public function destroy()
    {
        $_SESSION = array();
        session_destroy();
    }

    /**
     * @param $path
     */
    public function setSavePath($path)
    {
        if (is_dir($path)) {
            session_save_path($path);
        } else {
            throw new \RuntimeException("Session save path is not a valid directory: $path");
        }
    }
}
