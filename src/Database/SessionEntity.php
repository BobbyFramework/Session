<?php
namespace BobbyFramework\Core\Components\Session\Database;

class SessionEntity
{
    protected $idSession;
    protected $ipAddress;
    protected $userAgent;
    protected $lastActivity;
    protected $userData;
    protected $idUser;
    protected $culture;

    public static function getNameTable()
    {
        return 'session';
    }

}