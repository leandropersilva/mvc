<?php

require_once 'src/utils/Controller.php';

class Controller extends Controller {

    public function home() {
        $this->render('controller_folder/item');
    }
}