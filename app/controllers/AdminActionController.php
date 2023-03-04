<?php

require_once 'model/SportsmanDAO.php';
require_once 'model/ActivityDAO.php';
require_once 'model/ActivityEntryDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class AdminActionController implements Controller
{
    /**
     * Handle the request to list activities
     * @param array $request $_REQUEST
     */

    public function handle(array $request)

    {

        if (isset($request['reset-account']) && !empty($request['reset-account'])) {

            $email = htmlspecialchars($request['reset-account']);
            $activities = ActivityDAO::getInstance()->findAllFromSportsman($email);
            foreach ($activities as $a) {
                $id = $a->getIdActivity();
                ActivityEntryDAO::getInstance()->deleteFromActivity($id);
                ActivityDAO::getInstance()->delete($id);
            }

            $_SESSION['all_accounts'] = SportsmanDAO::getInstance()->findAll();

        } else if (isset($request['delete-account']) && !empty($request['delete-account'])) {

            $email = htmlspecialchars($request['delete-account']);
            $activities = ActivityDAO::getInstance()->findAllFromSportsman($email);
            foreach ($activities as $a) {
                $id = $a->getIdActivity();
                ActivityEntryDAO::getInstance()->deleteFromActivity($id);
                ActivityDAO::getInstance()->delete($id);
            }
            SportsmanDAO::getInstance()->delete($email);

            $_SESSION['all_accounts'] = SportsmanDAO::getInstance()->findAll();

        }

    }

}