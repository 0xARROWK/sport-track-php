<?php

require_once 'model/SportsmanDAO.php';
require_once 'Controller.php';

/**
 * Class ListActivityController
 */
class ModifyAccountController implements Controller
{
    /**
     * Handle the request to list activities
     * @param array $request $_REQUEST
     */

    public function handle(array $request)
    {

        if (isset($request['firstName']) && !empty($request['firstName'])
            && isset($request['lastName']) && !empty($request['lastName'])
            && isset($request['gender']) && !empty($request['gender'])
            && isset($request['height']) && !empty($request['height'])
            && isset($request['weight']) && !empty($request['weight'])) {

            $firstName = htmlspecialchars($request['firstName']);
            $lastName = htmlspecialchars($request['lastName']);
            $birthday = SportsmanDAO::getInstance()->findOne($_SESSION['user']['email'])[0]->getBirthday();
            $gender = htmlspecialchars($request['gender']);
            $height = htmlspecialchars($request['height']);
            $weight = htmlspecialchars($request['weight']);
            $pwd = "";

            $error = false;

            if (isset($request['pwd']) && !empty($request['pwd'])) {
                $pwd = $request['pwd'];
                if (!preg_match("/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $pwd) || strlen($pwd) < 6) {
                    $error = true;
                    $_SESSION['error']['message'] = "Le mot de passe doit contenir au moins 1 minuscule, 1 majuscule, 1 chiffre et doit avoir une longueur minimale de 6 charactères.";
                    $_SESSION['error']['return'] = "modify_account_form";
                }
                $pwd = password_hash($request['pwd'], PASSWORD_DEFAULT);
            }


            if (!preg_match("/^[a-zA-Z-]{1,30}$/", $firstName) || !preg_match("/^[a-zA-Z-]{1,30}$/", $lastName)) {
                $error = true;
                $_SESSION['error']['message'] = "Les noms et prénoms ne peuvent contenir que des lettres minuscules et majuscules, non accentuées, ainsi que des tirets.";
                $_SESSION['error']['return'] = "modify_account_form";
            } else if (!preg_match("/^[a-zA-Z]{1,50}$/", $gender)) {
                $error = true;
                $_SESSION['error']['message'] = "Le genre ne peut contenir que des lettres minuscules et majuscules, non accentuées.";
                $_SESSION['error']['return'] = "modify_account_form";
            }

            if (!$error) {

                SportsmanDAO::getInstance()->update($_SESSION['user']['email'], $firstName, $lastName, $birthday, $gender, $height, $weight, $pwd);

                $_SESSION['user']['modify_information'] = SportsmanDAO::getInstance()->findOne($_SESSION['user']['email']);

            }

        } else {

            $_SESSION['error']['message'] = "Un ou plusieurs champs n'ont pas été rempli correctement.";
            $_SESSION['error']['return'] = "modify_account_form";

        }

    }

}