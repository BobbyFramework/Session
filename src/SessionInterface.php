<?php
namespace BobbyFramework\Core\Components\Session;

interface SessionInterface {

    public function setAttribute($attr, $value);

    public function getAttribute($attr);

    public function setAttributeUserData($attr, $value);

    public function getAttributeUserData($attr);

    public function destroyUserData();

    public function destroy();
}