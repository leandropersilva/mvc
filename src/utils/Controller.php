<?php
class Controller {

    public function load_view($view) {
        if (!file_exists('src/view/' . $view . '.php')) {
            http_response_code(404);
            include 'src/view/404/404.php';
            exit;
        }
        require_once 'src/utils/wrapHtml/startHtml.php';
        require_once 'src/view/' . $view . '.php';
        require_once 'src/utils/wrapHtml/endHtml.php';
    }

    public function load_model($model) {
        if (!file_exists('src/model/' . $model . '.php')) {
            http_response_code(404);
            include 'src/model/404/404.php';
            exit;
        }
        require_once 'src/model/' . $model . '.php';
    }

    public function render($component){

        // $model = explode('/', $component)[1];
        if(!file_exists('src/model/' . $component . '.php')) {
            http_response_code(404);
            echo "model not found";
            exit;
        }
        require_once 'src/model/' . $component . '.php';

        if (!file_exists('src/view/' . $component . '.php')) {
            http_response_code(404);
            include 'src/view/404/404.php';
            exit;
        }
        require_once 'src/utils/wrapHtml/startHtml.php';
        require_once 'src/view/' . $component . '.php';
        require_once 'src/utils/wrapHtml/endHtml.php';

    }
    public function modal($component){

        if(!file_exists('src/model/' . $component . '.php')) {
            http_response_code(404);
            echo "model not found";
            exit;
        }
        require_once 'src/model/' . $component . '.php';

        if (!file_exists('src/view/' . $component . '.php')) {
            http_response_code(404);
            include 'src/view/404/404.php';
            exit;
        }
        require_once 'src/utils/wrapHtml/startHtml.php';
        require_once 'src/view/' . $component . '.php';
        require_once 'src/utils/wrapHtml/endHtml.php';

    }
}