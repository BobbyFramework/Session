<?php
namespace BobbyFramework\Core\Components\Session\Flash;
/**
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 30/04/2016
 * Time: 21:11
 */

class Flash implements FlashInterface
{

    public function set($value)
    {
        $_SESSION['flash'] = $value;
    }

    public function get()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    public function has()
    {
        return isset($_SESSION['flash']);
    }
}