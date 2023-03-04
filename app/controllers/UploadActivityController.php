<?php

require_once 'controllers/Controller.php';
require_once 'controllers/calcul_distance/DistanceCalculation.php';
require_once 'controllers/calcul_distance/DistanceCalculationImpl.php';
require_once 'model/Activity.php';
require_once 'model/ActivityDAO.php';
require_once 'model/ActivityEntry.php';
require_once 'model/ActivityEntryDAO.php';

/**
 * Class UploadActivityController
 */
class UploadActivityController implements Controller
{
    /**
     * Handle the request to upload an activity
     * @param array $request $_REQUEST
     */
    public function handle(array $request)
    {

        $allowed = array('json');
        $filename = $_FILES['activity-file']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($ext, $allowed)) {

            $content = json_decode(file_get_contents($_FILES['activity-file']['tmp_name']), true);

            if ($content !== null && sizeof($content) !== 0) {

                if (isset($content['activity']['date']) && !empty($content['activity']['date'])
                    && isset($content['activity']['description']) && !empty($content['activity']['description'])
                    && isset($content['data']) && !empty($content['data'])) {

                    $parcours = $content['data'];
                    $distance = DistanceCalculationImpl::calculatePathDistance($parcours);

                    $activity = new Activity();
                    $activity->init(
                        $_SESSION['user']['email'],
                        htmlspecialchars($content['activity']['date']),
                        htmlspecialchars($content['activity']['description']),
                        $distance
                    );

                    $idActivity = ActivityDAO::getInstance()->insert($activity);
                    $activityEntryDAO = ActivityEntryDAO::getInstance();

                    foreach ($parcours as $dataPoint) {
                        $activityEntry = new ActivityEntry();
                        $activityEntry->init($idActivity, $dataPoint['time'], $dataPoint['cardio_frequency'], $dataPoint['latitude'], $dataPoint['longitude'], $dataPoint['altitude']);
                        $activityEntryDAO->insert($activityEntry);
                    }

                    $a = ActivityDAO::getInstance()->findAllFromSportsman($_SESSION['user']['email']);

                    if (sizeof($a) !== 0 && $a !== null) {
                        $_SESSION['user']['activity'] = $a;
                    }

                } else {

                    $_SESSION['error']['message'] = "Le fichier JSON est incomplet";
                    $_SESSION['error']['return'] = "upload_activity_form";

                }

            } else {

                $_SESSION['error']['message'] = "Le fichier JSON ne peut pas être vide";
                $_SESSION['error']['return'] = "upload_activity_form";

            }

        } else {

            $_SESSION['error']['message'] = "Le fichier uploadé doit être au format JSON.";
            $_SESSION['error']['return'] = "upload_activity_form";
            
        }
    }
}