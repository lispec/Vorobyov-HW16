<?php

/**
 * Class UserSession
 * @property bool isGuest
 * @property string username
 */
class UserSession {

    private $isGuest = true;
    private $username = null;

    private static $instance;
    private function __construct() {
        session_start();

        $this->isGuest = isset($_SESSION['isGuest']) ? $_SESSION['isGuest'] : true;
        $this->username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    }

    // Использования Singleton для создания только один раз объекта UserSession (если он еще не создан)
    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __get($name) {
        if($name == 'isGuest') {
            return $this->isGuest;
        } else if($name == 'username') {
            return $this->username;
        }
    }

    public function login($username) {
        $this->username = $username;
        $this->isGuest = false;
        
        $_SESSION['isGuest'] = $this->isGuest;
        $_SESSION['username'] = $this->username;
    }
    
    public function logout() {
        $this->username = null;
        $this->isGuest = true;

        unset($_SESSION['isGuest']);
        unset($_SESSION['username']);
        session_destroy();
    }
}