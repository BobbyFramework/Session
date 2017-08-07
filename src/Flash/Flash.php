<?php
namespace BobbyFramework\Session\Flash;

/**
 * Class Flash
 * @package BobbyFramework\Session\Flash
 */
class Flash implements FlashInterface
{
    /**
     * @param $value
     */
    public function set($value)
    {
        $_SESSION['flash'] = $value;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    /**
     * @return bool
     */
    public function has()
    {
        return isset($_SESSION['flash']);
    }
}