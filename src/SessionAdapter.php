<?php

namespace BobbyFramework\Session;

/**
 * Class SessionAdapter
 * @package BobbyFramework\Session
 */
abstract class SessionAdapter
{
    /**
     * @var null|string
     */
    protected $name = null;

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @throws \Exception
     */
    public function setName($name)
    {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $name)) {
            throw new \Exception(
                'Name provided contains invalid characters; must be alphanumeric only'
            );
        }
        $this->name = $name;
    }
}
