<?php

/**
 * Class SqliteConnection
 */
class SqliteConnection
{
    /**
     * @var SqliteConnection
     */
    private static $instance;
    /**
     * @var PDO
     */
    private $connection;

    /**
     * SqliteConnection constructor
     *
     * @throws Exception
     */

    private function __construct()
    {
        try {

            $this->connection = new PDO('sqlite:'.__DIR__.'/db/sport-track.db', '', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

        } catch (PDOException $e) {

            throw new Exception('Unable to connect to database : ' . $e->getMessage(), 1);

        }

    }

    /**
     * This method allows to create an instance of the SqliteConnection class if it does not exist and to return it.
     *
     * @return SqliteConnection
     */

    public final static function getInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new SqliteConnection();
        }

        return self::$instance;

    }

    /**
     * This method creates a new connection to the database and returns this instance.
     *
     * @return PDO
     */

    public function getConnection()
    {

        return $this->connection;

    }

}

