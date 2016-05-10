<?php
/**
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 10/05/2016
 * Time: 13:30
 */
namespace BobbyFramework\Core\Components\Session;

abstract class SessionAdapter
{
    protected $_name = null;
    protected $_isStarted = false;

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $name)) {
            throw new \Exception(
                'Name provided contains invalid characters; must be alphanumeric only'
            );
        }
        $this->_name = $name;
    }
    
    public function isStarted()
    {
        return $this->_isStarted;
    }
}

