<?php

namespace BobbyFramework\Session\Flash;
/**
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 30/04/2016
 * Time: 21:11
 */

interface FlashInterface
{

    public function set($value);

    public function get();

    public function has();
}