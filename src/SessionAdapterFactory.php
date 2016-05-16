<?php
namespace BobbyFramework\Core\Components\Session;

/**
 * Class SessionAdapterFactory
 * @package BobbyFramework\Core\Components\Session
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
        $className = 'BobbyFramework\\Core\\Components\\Session\\Adapter\\' . ucfirst($adapterName);


        // Assuming Class files are already loaded using autoload concept
        if (class_exists($className)) {
            return new $className();
        } else {
            throw new \Exception('Adapter type not found.');
        }
    }
}