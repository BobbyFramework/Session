<?php

namespace BobbyFramework\Core\Components\Session;

use BobbyFramework\Core\Components\Session\Adapter\Native;
use BobbyFramework\Core\Components\Session\Flash\Flash;
use BobbyFramework\Core\Components\Session\Flash\FlashInterface;

/**
 * Class Session
 * @package BobbyFramework\Core\Components\Session
 */
class Session implements SessionInterface, SessionAdapterInterface
{
    private $_flash;
    private $_adapter;
    private $_isStarted = false;


    /**
     * Session constructor.
     * @param FlashInterface|null $flash
     */
    public function __construct(SessionAdapterInterface $sessionAdapterInterface = null, FlashInterface $flash = null)
    {

        $this->_adapter = $sessionAdapterInterface ?: new Native();
        $this->_flash = $flash ?: new Flash();
    }

    public function setId($value)
    {
        $this->_adapter->setId($value);

        return $this;
    }

    public function getId()
    {
        return $this->_adapter->getId();
    }

    public function set($attr, $value)
    {
        $this->_adapter->set($attr, $value);
        return $this;
    }

    public function get($attr, $defaultValue = null)
    {
        return $this->_adapter->get($attr, $defaultValue);
    }

    public function getFlash()
    {
        return $this->_flash;
    }

    public function remove($attr)
    {
        $this->_adapter->remove($attr);
    }

    public function removeAll()
    {
        $this->_adapter->removeAll();
    }

    public function destroy()
    {
        if (true === $this->isStarted()) {
            $this->_adapter->destroy();
            return true;
        }
        return false;
    }

    public function has($attr)
    {
        return $this->_adapter->has($attr);
    }

    public function start()
    {
        $this->_adapter->start();
    }

    public function stop()
    {
        $this->_adapter->stop();
    }


    public function isStarted()
    {
        return $this->_isStarted;
    }

    public function setName($name)
    {
        $this->_adapter->setName($name);

        return $this;
    }

    public function getName()
    {
        return $this->_adapter->getName();
    }
}