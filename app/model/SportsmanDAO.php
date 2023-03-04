<?php

require_once 'model/SqliteConnection.php';

/**
 * Class SportsmanDAO | management for Sportsman
 */
class SportsmanDAO
{
    /**
     * @var mixed
     */
    private static $dao;

    /**
     * SportsmanDAO constructor
     */
    private function __construct()
    {
    }

    /**
     * This method gives the current instance of SportsmanDAO
     *
     * @return SportsmanDAO
     */
    public final static function getInstance(): SportsmanDAO
    {
        if (!isset(self::$dao)) {
            self::$dao = new SportsmanDAO();
        }

        return self::$dao;
    }

    /**
     * This method allows to get all information of all Sportsman
     *
     * @return array
     */
    public final function findAll(): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Sportsman order by lastName, firstName";
        $stmt = $dbc->query($query);

        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Sportsman');

        return $results;
    }

    public final function findAllSortByTotalDistance(): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select email, firstName, lastName from Sportsman, Activity where sportsman = email group by email, firstName, lastName order by SUM(totalDistance) desc";
        $stmt = $dbc->query($query);

        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Sportsman');

        return $results;
    }

    /**
     * This method allows to get all information of all Sportsman
     *
     * @param string $email
     * @return array
     */

    public final function findOne(string $email): array
    {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Sportsman where email = :email";

        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Sportsman');

        return $results;
    }

    /**
     * This method allows to insert a new Sportsman from its object
     *
     * @param Sportsman $sportsman
     * @return int
     */

    public final function insert(Sportsman $sportsman): int
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "insert into Sportsman(email, lastName, firstName, birthday, gender, height, weight, pwd) values (:e, :l, :f, :b, :g, :h, :w, :p)";
        $stmt = $dbc->prepare($query);

        // bind the paramaters
        $stmt->bindValue(':e', $sportsman->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':l', $sportsman->getLastname(), PDO::PARAM_STR);
        $stmt->bindValue(':f', $sportsman->getFirstname(), PDO::PARAM_STR);
        $stmt->bindValue(':b', $sportsman->getBirthday(), PDO::PARAM_STR);
        $stmt->bindValue(':g', $sportsman->getGender(), PDO::PARAM_STR);
        $stmt->bindValue(':h', $sportsman->getHeight(), PDO::PARAM_INT);
        $stmt->bindValue(':w', $sportsman->getWeight(), PDO::PARAM_INT);
        $stmt->bindValue(':p', $sportsman->getPwd(), PDO::PARAM_STR);

        // execute the prepared statement
        try {
            $stmt->execute();
        } catch (Exception $e) {
            echo $e;
        }

        return $dbc->lastInsertId();
    }

    /**
     * This method allows to delete a Sportsman
     *
     * @param string $email - The sportsman's email to delete
     */

    public function delete(string $email)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "delete from Sportsman where email = :e";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':e', $email, PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();
    }

    /**
     * This method allows to update a sportsman from its object
     *
     * @param string $email - The sportsman's email to update
     * @param string $firstname - The new firstname
     * @param string $lastname - The new lastname
     * @param string $birthday - The birthday entered for this account
     * @param string $gender - The new gender
     * @param float $height - The new height
     * @param float $weight - The new weight
     * @param string $pwd - The new pwd
     */
    public function update(string $email, string $firstname, string $lastname, string $birthday, string $gender, float $height, float $weight, string $pwd)
    {
        $dbc = SqliteConnection::getInstance()->getConnection();

        // prepare the SQL statement
        $query = "update sportsman set firstName = :f, lastName = :l, birthday = :b, gender = :g, height = :h, weight = :w where email = :e";
        $stmt = $dbc->prepare($query);

        // bind the parameters
        $stmt->bindValue(':f', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':l', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':b', $birthday, PDO::PARAM_STR);
        $stmt->bindValue(':g', $gender, PDO::PARAM_STR);
        $stmt->bindValue(':h', $height, PDO::PARAM_STR);
        $stmt->bindValue(':w', $weight, PDO::PARAM_STR);
        $stmt->bindValue(':e', $email, PDO::PARAM_STR);

        // execute the prepared statement
        $stmt->execute();

        // check if new password is set
        if ($pwd !== "") {

            // prepare the SQL statement
            $query = "update sportsman set pwd = :p where email = :e";
            $stmt = $dbc->prepare($query);

            // bind the parameters
            $stmt->bindValue(':p', $pwd, PDO::PARAM_STR);
            $stmt->bindValue(':e', $email, PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();

        }


    }
}