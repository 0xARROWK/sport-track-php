<?php

require_once 'model/ActivityEntryDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class ShowActivityEntriesController implements Controller
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

            $a = ActivityEntryDAO::getInstance()->findAllFromActivity($id);

            if (sizeof($a) !== 0 && $a !== null) {
                $_SESSION['user']['activity_entries'] = $a;
            }

            $_SESSION['user']['activity_id'] = $id;

        } else {

            $_SESSION['error']['message'] = "Une erreur est survenue lors de la récupération des entrées";
            $_SESSION['error']['return'] = "list_activities";

        }

    }

}