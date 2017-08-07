<?php

namespace BobbyFramework\Session;

use BobbyFramework\Session\Adapter\Native;
use BobbyFramework\Session\Flash\Flash;
use BobbyFramework\Session\Flash\FlashInterface;

/**
 * Class Session
 * @package BobbyFramework\Session
 */
class Session implements SessionInterface, SessionAdapterInterface
{
    /**
     * @var Flash
     */
    private $flash;

    /**
     * @var Native
     */
    private $adapter;

    /**
     * Session constructor.
     * @param SessionAdapterInterface|null $sessionAdapterInterface
     * @param FlashInterface|null $flash
     */
    public function __construct(SessionAdapterInterface $sessionAdapterInterface = null, FlashInterface $flash = null)
    {
        $this->adapter = $sessionAdapterInterface ?: new Native();
        $this->flash = $flash ?: new Flash();
    }

    /**
     * @param $value
     * @return $this
     */
    public function setId($value)
    {
        $this->adapter->setId($value);

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->adapter->getId();
    }

    /**
     * @param $attr
     * @param $value
     * @return $this
     */
    public function set($attr, $value)
    {
        $this->adapter->set($attr, $value);

        return $this;
    }

    /**
     * @param $attr
     * @param null $defaultValue
     * @return null
     */
    public function get($attr, $defaultValue = null)
    {
        return $this->adapter->get($attr, $defaultValue);
    }

    /**
     * @return Flash
     */
    public function getFlash()
    {
        return $this->flash;
    }

    /**
     * @param string $attr
     */
    public function remove($attr)
    {
        $this->adapter->remove($attr);
    }

    /**
     *
     */
    public function removeAll()
    {
        $this->adapter->removeAll();
    }

    /**
     * @return bool
     */
    public function destroy()
    {
        if (true === $this->isStarted()) {
            $this->adapter->destroy();
            return true;
        }
        return false;
    }

    /**
     * @param $attr
     * @return bool
     */
    public function has($attr)
    {
        return $this->adapter->has($attr);
    }

    /**
     *
     */
    public function start()
    {
        $this->adapter->start();
    }

    /**
     *
     */
    public function stop()
    {
        $this->adapter->stop();
    }

    /**
     * @return bool
     */
    public function isStarted()
    {
        return $this->adapter->isStarted();
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->adapter->setName($name);

        return $this;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->adapter->getName();
    }
}
