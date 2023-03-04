<?php
require_once 'model/SqliteConnection.php';
require_once 'model/Activity.php';

/**
 * Class ActivityDAO | management class of Activity
 */
class ActivityDAO
{
    /**
     * @var ActivityDAO
     */
    private static $dao;

    /**
     * ActivityDAO constructor.
     */
    private function __construct()
    {
    }

    /**
     * This method return the current instance of ActivityDAO
     *
     * @return ActivityDAO
     */

    public final static function getInstance(): ActivityDAO
    {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityDAO();
        }
        return self::$dao;
    }

    /**
     * This method allows to get all information of all activities
     *
     * @return array
     */

    public final function findAll(): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Activity";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
        return $results;
    }

    /**
     * This method allows to get all information of all activities of a sportsman
     *
     * @param string $sportsman
     * @return array
     */

    public final function findAllFromSportsman(string $sportsman): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Activity where sportsman = :sp";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':sp', $sportsman, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activity');
        return $results;
    }

    public final function findDistanceSumFromSportsman(string $sportsman): float
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select SUM(totalDistance) from Activity where sportsman = :sp";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':sp', $sportsman, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetch()['SUM(totalDistance)'];

        if (!isset($results)) {
            $results = 0;
        }

        return $results;
    }

    /**
     * This method allows to insert a new Activity from its object
     *
     * @param Activity $st
     * @return int
     */

    public final function insert(Activity $st): int
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "insert into Activity(sportsman, day, description, totalDistance) values (:sp, :dayOfActivity, :description, :totalDistance)";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':sp', $st->getSportsman(), PDO::PARAM_STR);
        $stmt->bindValue(':dayOfActivity', $st->getDay(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $st->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':totalDistance', $st->getTotalDistance(), PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();

        return $dbc->lastInsertId();
    }

    /**
     * This method allows to delete an Activity
     *
     * @param int $id - The Activity's id
     */
    public function delete(int $id)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "delete from Activity where idActivity = :id";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        // execute the prepared statement
        $stmt->execute();
    }

    /**
     * This method allows to update an activity from its object
     *
     * @param Activity $activity - The Activity's object for get its id
     */
    public function update(Activity $activity)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "update Activity set sportsman = :sp, day = :dayOfActivity, description = :description where idActivity = :id";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':id', $activity->getIdActivity(), PDO::PARAM_INT);
        $stmt->bindValue(':sp', $activity->getSportsman(), PDO::PARAM_STR);
        $stmt->bindValue(':dayOfActivity', $activity->getDay(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $activity->getDescription(), PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();
    }
}

