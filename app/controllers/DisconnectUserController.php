<?php

require_once 'controllers/Controller.php';

/**
 * Class DisconnectUserController
 */
class DisconnectUserController implements Controller
{

    /**
     * Handle the request to disconnect an user
     * @param array $request $_REQUEST
     */
    public function handle(array $request)
    {
        session_unset();
        session_destroy();
    }
}