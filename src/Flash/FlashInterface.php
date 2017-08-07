<?php

namespace BobbyFramework\Session\Flash;

/**
 * Interface FlashInterface
 * @package BobbyFramework\Session\Flash
 */
interface FlashInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function set($value);

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function has();
}
