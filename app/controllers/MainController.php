<?php
require_once 'model/Sportsman.php';
require_once 'model/SportsmanDAO.php';
require_once 'model/ActivityDAO.php';
require_once 'model/Activity.php';
require_once 'controllers/Controller.php';

/**
 * Class MainController
 */
class MainController implements Controller
{
    /**
     * Default controller
     * @param array $request
     */
    public function handle(array $request)
    {
        $sportsmen = SportsmanDAO::getInstance()->findAllSortByTotalDistance();

        if (sizeof($sportsmen) !== 0 && $sportsmen !== null) {
            foreach ($sportsmen as $key => $sportsman) {
                $distance_sum = ActivityDAO::getInstance()->findDistanceSumFromSportsman($sportsman->getEmail());
                $sportsman->distance_sum = $distance_sum;
            }

            $_SESSION['users'] = $sportsmen;
        }

    }
}
