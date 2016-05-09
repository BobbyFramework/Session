<?php
namespace BobbyFramework\Core\Components\Session\Database;

class SessionCookie {

    private $_path = '/';
    private $_nameCookie = 'user_session_id';

    public function create($id, $expiration = null)
    {
        if(null === $expiration) {
            $expiration = time() + 60 * 60 * 24 * 365;
        }

        return setcookie($this->_nameCookie, $id, $expiration, $this->_path);
    }

    public function get()
    {
        return (isset($_COOKIE[$this->_nameCookie])) ? $_COOKIE[$this->_nameCookie] : false;
    }

    public function destroy()
    {
        if($this->get()) {
            $expiration = time() - 3600;
            $this->create('', $expiration);
            unset($_COOKIE[$this->_nameCookie]);
        }
    }
}