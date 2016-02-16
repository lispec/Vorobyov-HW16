<?php

class IndexController extends BaseController
{
    public function execute($arguments = [])
    {

        if (!UserSession::getInstance()->isGuest) {
            Router::redirect('/user/' . UserSession::getInstance()->username);
        }

        if (!empty($_POST)) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $fdb = new FileDB(__DIR__ . '/../db');
                if ($fdb->findUser($_POST['username'], $_POST['password'])) {
                    UserSession::getInstance()->login($_POST['username']);      // логинит и устанавливает сессию
                    Router::redirect('/');
                } else {
                    $ErrorLogin = "Вы ввели неверный логин или пароль. Повторите ввод.";
                }

            }
        }

        require_once 'views/parts/header.php';

        require_once 'views/main.php';

        require_once 'views/parts/footer.php';

        return true;
    }
}