<?php
/**
 * Created by PhpStorm.
 * User: olkani
 * Date: 28.04.18
 * Time: 18:27
 */

namespace Application\Controllers;

use Application\Core\Controller;

/** Class controller for make views with diff. errors
 */
class ErrorController extends Controller {

    public function error_404Action() {
        $this->view->render('404');
    }
}