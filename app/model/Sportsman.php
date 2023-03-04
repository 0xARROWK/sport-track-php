<?php

/**
 * Class Sportsman
 */
class Sportsman
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $birthday;
    /**
     * @var string
     */
    private $gender;
    /**
     * @var float
     */
    private $height;
    /**
     * @var float
     */
    private $weight;
    /**
     * @var string
     */
    private $pwd;


    /**
     * Sportsman constructor.
     */
    public function __construct()
    {
    }

    /**
     * This method allows to store user's information in this object.
     *
     * @param string $email User's email
     * @param string $firstName User's firstName
     * @param string $lastName User's lastName
     * @param string $birthday User's birthday
     * @param string $gender User's gender
     * @param float $height User's height
     * @param float $weight User's weight
     * @param string $pwd User's password
     */
    public function init(string $email, string $firstName, string $lastName, string $birthday, string $gender, float $height, float $weight, string $pwd)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->height = $height;
        $this->weight = $weight;
        $this->pwd = $pwd;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }


    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }


    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }


    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }
}