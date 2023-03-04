<?php

// start session
session_start();

/**
 * Class ApplicationController
 */
class ApplicationController
{
    /**
     * @var ApplicationController
     */
    private static $instance;

    /**
     * @var array[]
     */
    private $routes;

    /**
     * ApplicationController constructor.
     */

    private function __construct()
    {
        // Sets the controllers and the views of the application.
        $this->routes = [
            '/' => ['controller' => 'MainController', 'view' => "MainView", 'hasToBeConnected' => false, 'hasToBeAdmin' => false],
            'user_add_form' => ['controller' => null, 'view' => 'AddUserForm', 'hasToBeConnected' => false, 'hasToBeAdmin' => false],
            'user_add' => ['controller' => 'AddUserController', 'view' => 'AddUserValidationView', 'hasToBeConnected' => false, 'hasToBeAdmin' => false],
            'user_connect_form' => ['controller' => null, 'view' => 'ConnectUserForm', 'hasToBeConnected' => false, 'hasToBeAdmin' => false],
            'user_connect' => ['controller' => 'ConnectUserController', 'view' => 'ConnectUserValidationView', 'hasToBeConnected' => false, 'hasToBeAdmin' => false],
            'user_disconnect' => ['controller' => 'DisconnectUserController', 'view' => 'DisconnectUserView', 'hasToBeConnected' => false, 'hasToBeAdmin' => false],
            'upload_activity' => ['controller' => 'UploadActivityController', 'view' => 'ListActivityView', 'hasToBeConnected' => true, 'hasToBeAdmin' => false],
            'list_activities' => ['controller' => 'ListActivityController', 'view' => 'ListActivityView', 'hasToBeConnected' => true, 'hasToBeAdmin' => false],
            'delete_activity' => ['controller' => 'DeleteActivityController', 'view' => 'ListActivityView', 'hasToBeConnected' => true, 'hasToBeAdmin' => false],
            'activity_details' => ['controller' => 'ShowActivityEntriesController', 'view' => 'ListActivityEntriesView', 'hasToBeConnected' => true, 'hasToBeAdmin' => false],
            'modify_account_form' => ['controller' => 'PrepareAccountModificationController', 'view' => 'ModifyAccountView', 'hasToBeConnected' => true, 'hasToBeAdmin' => false],
            'modify_account' => ['controller' => 'ModifyAccountController', 'view' => 'ModifyAccountView', 'hasToBeConnected' => true, 'hasToBeAdmin' => false],
            'admin_panel' => ['controller' => 'AdminController', 'view' => 'AdminView', 'hasToBeConnected' => true, 'hasToBeAdmin' => true],
            'admin_action' => ['controller' => 'AdminActionController', 'view' => 'AdminView', 'hasToBeConnected' => true, 'hasToBeAdmin' => true],
            'error' => ['controller' => null, 'view' => 'ErrorView', 'hasToBeConnected' => false, 'hasToBeAdmin' => false]
        ];
    }

    /**
     * Returns the single instance of this class.
     * @return ApplicationController the single instance of this class.
     */

    public static function getInstance() : ApplicationController
    {
        if (!isset(self::$instance)) {
            self::$instance = new ApplicationController;
        }
        return self::$instance;
    }

    /**
     * Returns the controller that is responsible for processing the request
     * specified as parameter. The controller can be null if their is no data to
     * process.
     * @param array $request The HTTP request.
     * @return mixed
     */

    public function getController(array $request)
    {

        if (array_key_exists($request['page'], $this->routes)) {

            if (!$this->routes[$request['page']]['hasToBeAdmin']) {

                if ($this->routes[$request['page']]['hasToBeConnected'] && isset($_SESSION['user']['email']) && !empty($_SESSION['user']['email'])) {
                    return $this->routes[$request['page']]['controller'];
                } else if (!$this->routes[$request['page']]['hasToBeConnected']) {
                    return $this->routes[$request['page']]['controller'];
                } else {
                    return null;
                }

            } else {

                if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
                    return $this->routes[$request['page']]['controller'];
                } else {
                    return null;
                }

            }

        }

        return null;

    }

    /**
     * Returns the view that must be return in response of the HTTP request
     * specified as parameter.
     * @param array $request The HTTP request.
     * @return mixed
     */

    public function getView(array $request)
    {
        if (array_key_exists($request['page'], $this->routes)) {

            if (!$this->routes[$request['page']]['hasToBeAdmin']) {

                if ($this->routes[$request['page']]['hasToBeConnected'] && isset($_SESSION['user']['email']) && !empty($_SESSION['user']['email'])) {
                    return $this->routes[$request['page']]['view'];
                } else if (!$this->routes[$request['page']]['hasToBeConnected']) {
                    return $this->routes[$request['page']]['view'];
                } else {
                    $_SESSION['error']['message'] = "Veuillez vous identifier";
                    $_SESSION['error']['return'] = "/";
                    return $this->routes['error']['view'];
                }

            } else {

                if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
                    return $this->routes[$request['page']]['view'];
                } else {
                    $_SESSION['error']['message'] = "Permission non accordée";
                    $_SESSION['error']['return'] = "/";
                    return $this->routes['error']['view'];
                }

            }

        }

        return $this->routes['error']['view'];

    }
}
