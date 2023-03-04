<?php

require_once 'controllers/Controller.php';
require_once 'model/Sportsman.php';
require_once 'model/SportsmanDAO.php';

/**
 * Class ConnectUserController
 */
class ConnectUserController implements Controller
{

    /**
     * Handle the request to connect an user
     * @param array $request $_REQUEST
     */

    public function handle(array $request)
    {

        if (isset($request['email']) && !empty($request['email']) && isset($request['pwd']) && !empty($request['pwd'])) {

            $sportsmanDAO = SportsmanDAO::getInstance()->findOne($request['email']);

            if (sizeof($sportsmanDAO) !== 0 && password_verify($request['pwd'], $sportsmanDAO[0]->getPwd())) {

                if ($request['email'] === 'admin@sporttrack.fr') {

                    $_SESSION['admin'] = $request['email'];

                }

                $_SESSION['user']['email'] = $request['email'];
                $_SESSION['user']['firstname'] = $sportsmanDAO[0]->getFirstName();
                $_SESSION['user']['lastname'] = $sportsmanDAO[0]->getLastName();

            } else {

                $_SESSION['error']['message'] = "Adresse mail ou mot de passe incorrect.";
                $_SESSION['error']['return'] = "user_connect_form";

            }

        } else {

            $_SESSION['error']['message'] = "Un ou plusieurs champs n'ont pas été rempli correctement.";
            $_SESSION['error']['return'] = "user_connect_form";

        }
    }
}