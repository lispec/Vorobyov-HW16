<?php

class PhotoController extends BaseController {
    public function execute($arguments = []) {

        if(UserSession::getInstance()->isGuest) {
            Router::redirect('/');
        }

            require_once 'views/parts/header.php';

            require_once 'views/photo.php';

            require_once 'views/parts/footer.php';


            return true;

    }
}