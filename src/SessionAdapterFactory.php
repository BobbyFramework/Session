<?php
namespace BobbyFramework\Session;

/**
 * Class SessionAdapterFactory
 * @package BobbyFramework\Session
 */
class SessionAdapterFactory
{

    /**
     * @param $adapterName
     * @return mixed
     * @throws \Exception
     */
    public static function build($adapterName)
    {
        $className = 'BobbyFramework\\Session\\Adapter\\' . ucfirst($adapterName);

        // Assuming Class files are already loaded using autoload concept
        if (class_exists($className)) {
            return new $className();
        } else {
            throw new \Exception('Adapter type not found.');
        }
    }
}