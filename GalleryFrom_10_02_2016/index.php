<?php

//Реализовать вход и регистрацию в гостевую книгу, добавить проверку
// на существование пользователя, выводить предупреждения на форме
// регистрации или входа когда пользователь ввел неверный логин/пароль.

require_once 'components/Router.php';
require_once 'components/UserSession.php';
require_once 'models/FileDB.php';
require_once 'controllers/BaseController.php';

$router = new Router($_SERVER['REQUEST_URI']);

//UserSession::getInstance()->logout;

if(!$router->handle()) {
    echo 'Path not found.';
}