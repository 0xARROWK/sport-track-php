<?php

require_once 'model/SportsmanDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class AdminController implements Controller
{
    /**
     * Handle the request to list activities
     * @param array $request $_REQUEST
     */

    public function handle(array $request)

    {

        $_SESSION['all_accounts'] = SportsmanDAO::getInstance()->findAll();

    }

}