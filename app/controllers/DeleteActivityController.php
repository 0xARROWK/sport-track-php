<?php

require_once 'model/SportsmanDAO.php';
require_once 'model/ActivityDAO.php';
require_once 'model/ActivityEntryDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class DeleteActivityController implements Controller
{
    /**
     * Handle the request to list activities
     * @param array $request $_REQUEST
     */

    public function handle(array $request)
    {

        if (isset($request['activity-id']) && !empty($request['activity-id'])) {

            unset($_SESSION['user']['activity']);

            $id = (int)$request['activity-id'];

            ActivityEntryDAO::getInstance()->delete($id);
            ActivityDAO::getInstance()->delete($id);

            $a = ActivityDAO::getInstance()->findAllFromSportsman($_SESSION['user']['email']);

            if (sizeof($a) !== 0 && $a !== null) {
                $_SESSION['user']['activity'] = $a;
            }

        } else {

            $_SESSION['error']['message'] = "Une erreur est survenue lors de la suppression de l'activité";
            $_SESSION['error']['return'] = "list_activities";

        }

    }

}