<?php

class AddPhotoController extends BaseController {
    public function execute($arguments = []) {

        if(UserSession::getInstance()->isGuest) {
            Router::redirect('/');
        }

        require_once 'views/parts/header.php';

        require_once 'views/addPhoto.php';

        require_once 'views/parts/footer.php';

        return true;
    }
}