<?php

require_once 'model/ActivityDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class ListActivityController implements Controller
{
    /**
     * Handle the request to list activities
     * @param array $request $_REQUEST
     */

    public function handle(array $request)
    {

        $a = ActivityDAO::getInstance()->findAllFromSportsman($_SESSION['user']['email']);

        if (sizeof($a) !== 0 && $a !== null) {
            $_SESSION['user']['activity'] = $a;
        }

    }

}