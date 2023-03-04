<?php

require_once 'controllers/Controller.php';
require_once 'model/Sportsman.php';
require_once 'model/SportsmanDAO.php';

/**
 * Class AddUserController
 */
class AddUserController implements Controller
{

    /**
     * Handle the request to add an user
     * @param array $request $_REQUEST superglobal
     */
    public function handle(array $request)
    {

        $_SESSION['user']['add'] = array($request['lastName'], $request['firstName'], $request['birthday'], $request['gender'], $request['height'], $request['weight'], $request['email'], $request['pwd']);

        if (isset($request['email']) && !empty($request['email'])
            && isset($request['firstName']) && !empty($request['firstName'])
            && isset($request['lastName']) && !empty($request['lastName'])
            && isset($request['birthday']) && !empty($request['birthday'])
            && isset($request['gender']) && !empty($request['gender'])
            && isset($request['height']) && !empty($request['height'])
            && isset($request['weight']) && !empty($request['weight'])
            && isset($request['pwd']) && !empty($request['pwd'])) {

            $lastName = htmlspecialchars($request['lastName']);
            $firstName = htmlspecialchars($request['firstName']);
            $birthday = htmlspecialchars($request['birthday']);
            $gender = htmlspecialchars($request['gender']);
            $height = (float)htmlspecialchars($request['height']);
            $weight = (float)htmlspecialchars($request['weight']);
            $email = $request['email'];
            $pwd = $request['pwd'];

            $error = false;

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $_SESSION['error']['message'] = "L'adresse email saisie n'est pas au bon format.";
                $_SESSION['error']['return'] = "user_add_form";
                $_SESSION['user']['add'][6] = null;
            } else if (!preg_match("/^[a-zA-Z-]{1,30}$/", $firstName) || !preg_match("/^[a-zA-Z-]{1,30}$/", $lastName)) {
                $error = true;
                $_SESSION['error']['message'] = "Les noms et prénoms ne peuvent contenir que des lettres minuscules et majuscules, non accentuées, ainsi que des tirets.";
                $_SESSION['error']['return'] = "user_add_form";
                $_SESSION['user']['add'][0] = null;
                $_SESSION['user']['add'][1] = null;
            } else if (!preg_match("/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $pwd) || strlen($pwd) < 6) {
                $error = true;
                $_SESSION['error']['message'] = "Le mot de passe doit contenir au moins 1 minuscule, 1 majuscule, 1 chiffre et doit avoir une longueur minimale de 6 charactères.";
                $_SESSION['error']['return'] = "user_add_form";
                $_SESSION['user']['add'][7] = null;
            } else if (!preg_match("/^[a-zA-Z]{1,50}$/", $gender)) {
                $error = true;
                $_SESSION['error']['message'] = "Le genre ne peut contenir que des lettres minuscules et majuscules, non accentuées.";
                $_SESSION['error']['return'] = "user_add_form";
                $_SESSION['user']['add'][3] = null;
            }

            if (!$error) {

                $pwd = password_hash($request['pwd'], PASSWORD_DEFAULT);

                $sportsmanDAO = SportsmanDAO::getInstance()->findOne($email);

                if (sizeof($sportsmanDAO) === 0) {

                    $sportsman = new Sportsman();
                    $sportsman->init($email, $firstName, $lastName, $birthday, $gender, $height, $weight, $pwd);

                    $sportsmanDAO = SportsmanDAO::getInstance();
                    $sportsmanDAO->insert($sportsman);

                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['firstname'] = $firstName;
                    $_SESSION['user']['lastname'] = $lastName;

                    unset($_SESSION['user']['add']);

                } else {

                    $_SESSION['error']['message'] = "Cette adresse mail est déjà utilisée.";
                    $_SESSION['error']['return'] = "user_add_form";

                }

            }

        } else {

            $_SESSION['error']['message'] = "Un ou plusieurs champs n'ont pas été rempli correctement.";
            $_SESSION['error']['return'] = "user_add_form";

        }
    }
}