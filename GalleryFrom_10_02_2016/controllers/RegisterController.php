<?php

class RegisterController extends BaseController
{
    public function execute($arguments = [])
    {

        if (!UserSession::getInstance()->isGuest) {
            Router::redirect('/user/' . UserSession::getInstance()->username);
        }

        // проверяем зарегистрирован пользователь или нет, если да то просим его залогиниться а если нет то регистрируем и устанавливаем семмию
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
            if ($_POST['password'] == $_POST['password-confirm']) {

                $fdb = new FileDB(__DIR__ . '/../db');
                if (!$fdb->findUser($_POST['username'], $_POST['password'])) {
                    $fdb->addUser($_POST['username'], $_POST['password']);
                    UserSession::getInstance()->login($_POST['username']);      // логинит и устанавливает сессию
                    Router::redirect('/');
                } else {$userExists="Пользователь с таким логином уже зарегистрирован! Введите другое имя для регистрации. (если вы уже зарегистрированы то перейдите на страницу входа)";}
            }
        }

        require_once 'views/parts/header.php';

        require_once 'views/register.php';

        require_once 'views/parts/footer.php';


        return true;
    }
}