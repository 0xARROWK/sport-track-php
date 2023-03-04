<?php

// auto import of required classes
function Autoload($class)
{

    require_once $class . '.php';

}

spl_autoload_register('Autoload');

// init a new sportsman
$sportsman = new Sportsman();
$sportsman->init('arrowk@example.com', 'arrow', 'k', '07/07/07', 'Homme', 250, 120, 'superpassword');

// store the new sportsman into the database
$sportsmanDAO = SportsmanDAO::getInstance();
$sportsmanDAO->delete($sportsman);
$sportsmanDAO->insert($sportsman);

// display the new sportsman
$all = $sportsmanDAO->findAll();
echo "<h1>Sportif :</h1>\n\n";
print_r($all);

// init a new activity
$activity = new Activity();
$activity->init($sportsman->getEmail(), "12/09/2020", "IUT -> RU", 2);

// store the new activity into the database
$activityDAO = ActivityDAO::getInstance();
$activityDAO->delete($activity);
$idActivity = $activityDAO->insert($activity);

// display the new activity
$all = $activityDAO->findAll();
echo "<h1>Activité :</h1>\n\n";
print_r($all);

// init new ActivityEntry set
$activityEntry1 = new ActivityEntry();
echo "test : ".$idActivity;
$activityEntry1->init($idActivity, "00:05:00", 110, 2.5, 1.5, 50);
$activityEntry2 = new ActivityEntry();
$activityEntry2->init($idActivity, "00:05:00", 90, 1.5, 1.5, 45);

// store new set into the database
$activityEntryDAO = new ActivityEntryDAO();
$activityEntryDAO->delete($activityEntry1);
$activityEntryDAO->delete($activityEntry2);
$activityEntryDAO->insert($activityEntry1);
$activityEntryDAO->insert($activityEntry2);

// display the new Entry set
$all = $activityEntryDAO->findAllFromActivity($idActivity);
echo "<h1>Jeu de données :</h1>\n\n";
print_r($all);

// display the modified activity
$all = $activityDAO->findAll();
echo "<h1>Acitvité modifiée :</h1>\n\n";
print_r($all);

?>
