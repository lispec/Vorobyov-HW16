<?php

class Router {

    private $uri;
    private $routes = [
        '/^\/$/' => 'IndexController',
        '/\/index/' => 'IndexController',                     //  '/^\/index$/'
        '/\/user\/([A-Za-z0-9]+)/' => 'GalleryController',    //   '/^\/user\/([A-Za-z0-9]+)$/'
        '/\/signup/' => 'RegisterController',                 //  '/^\/signup$/'
        '/\/photo/' => 'AddPhotoController',                  // '/^\/photo$/'
        '/\/user\/([A-Za-z0-9]+)\/photo\/(\d+)/' => 'PhotoController',      // '/^\/user\/([A-Za-z0-9]+)\/photo\/(\d+)/'
        '/\/logout/' => 'LogoutController'
    ];

    public function __construct($requestUri) {
        $this->uri = $requestUri;
    }

    public function handle() {
        foreach($this->routes as $key => $value) {
            $matches = [];
            if(preg_match($key, $this->uri, $matches)) {
                if(!class_exists($value)) {
                    $controllerPath = 'controllers/' . $value . '.php';
                    if(file_exists($controllerPath)) {
                        require_once 'controllers/' . $value . '.php';
                    }
                }

                $controller = new $value();
                return $controller->execute($matches);
            }
        }

        return false;
    }

    public static function redirect($url) {
        header('Location: ' . $url);
    }
}