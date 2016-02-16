<?php

class LogoutController extends BaseController {

    public function execute($arguments = [])
    {
        UserSession::getInstance()->logout();
        Router::redirect('/');
        return true;
    }

}