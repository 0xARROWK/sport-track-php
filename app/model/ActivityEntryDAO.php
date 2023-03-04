<?php

require_once 'model/SqliteConnection.php';
require_once 'model/ActivityEntry.php';

/**
 * Class ActivityEntryDAO : management class of ActivityEntry
 */
class ActivityEntryDAO
{
    /**
     * @var ActivityEntryDAO
     */
    private static $dao;

    /**
     * ActivityEntryDAO constructor.
     */
    public function __construct()
    {

    }

    /**
     * This method return the current instance of ActivityEntryDAO
     *
     * @return ActivityEntryDAO
     */
    public final static function getInstance(): ActivityEntryDAO
    {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityEntryDAO();
        }
        return self::$dao;
    }

    /**
     * This method allows to get all information of all activities entry
     *
     * @return array
     */
    public final function findAll(): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from ActivityEntry";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'ActivityEntry');
        return $results;
    }

    /**
     * This method allows to get all information of all activities entry of an activity
     *
     * @param string $idActivity
     * @return array
     */
    public final function findAllFromActivity(string $idActivity): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from ActivityEntry where activity = :id";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':id', $idActivity, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'ActivityEntry');
        return $results;
    }

    /**
     * This method allows to insert a new ActivityEntry from its object
     *
     * @param ActivityEntry $st
     * @return int
     */
    public final function insert(ActivityEntry $st): int
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "insert into ActivityEntry(activity, timeD, cardioFrequency, latitude, longitude, altitude) values (:act,:time,:card,:lat, :lon, :alt)";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':act', $st->getActivity(), PDO::PARAM_INT);
        $stmt->bindValue(':time', $st->getTimeD(), PDO::PARAM_STR);
        $stmt->bindValue(':card', $st->getCardioFrequency(), PDO::PARAM_INT);
        $stmt->bindValue(':lat', $st->getLatitude(), PDO::PARAM_INT);
        $stmt->bindValue(':lon', $st->getLongitude(), PDO::PARAM_INT);
        $stmt->bindValue(':alt', $st->getAltitude(), PDO::PARAM_INT);

        // execute the prepared statement
        $stmt->execute();

        return $dbc->lastInsertId();
    }

    /**
     * This method allows to delete an ActivityEntry
     *
     * @param int $id - The ActivityEntry's id
     */
    public function delete(int $id)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "delete from ActivityEntry where idActivityEntry = :id";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();
    }

    /**
     * This method allows to delete all activity entries from an activity
     *
     * @param int $id - The Activity's id
     */
    public function deleteFromActivity(int $id)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "delete from ActivityEntry where activity = :id";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();
    }

    /**
     * This method allows to update an ActivityEntry from its object
     *
     * @param ActivityEntry $activity
     */
    public function update(ActivityEntry $activity)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "update ActivityEntry set activity = :act, timeD = :time, cardioFrequency = :card, latitude = :lat, longitude = :lon, altitude = :alt where idActivtyEntry = :id";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':id', $activity->getIdActivityEntry(), PDO::PARAM_STR);
        $stmt->bindValue(':act', $activity->getActivity(), PDO::PARAM_STR);
        $stmt->bindValue(':time', $activity->getTimeD(), PDO::PARAM_STR);
        $stmt->bindValue(':card', $activity->getCardioFrequency(), PDO::PARAM_STR);
        $stmt->bindValue(':lat', $activity->getLatitude(), PDO::PARAM_STR);
        $stmt->bindValue(':lon', $activity->getLongitude(), PDO::PARAM_STR);
        $stmt->bindValue(':alt', $activity->getAltitude(), PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();
    }
}
