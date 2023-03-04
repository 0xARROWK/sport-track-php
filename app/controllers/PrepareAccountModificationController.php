<?php

require_once 'model/SportsmanDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class PrepareAccountModificationController implements Controller
{
    /**
     * Handle the request to list activities
     * @param array $request $_REQUEST
     */

    public function handle(array $request)
    {

        $_SESSION['user']['modify_information'] = SportsmanDAO::getInstance()->findOne($_SESSION['user']['email']);

    }

}