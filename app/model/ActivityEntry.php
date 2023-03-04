<?php

/**
 * Class ActivityEntry : Each entry of an activity
 */
class ActivityEntry
{
    /**
     * @var int
     */
    private $idActivityEntry;
    /**
     * @var int
     */
    private $activity;
    /**
     * @var string
     */
    private $timeD;
    /**
     * @var float
     */
    private $cardioFrequency;
    /**
     * @var float
     */
    private $latitude;
    /**
     * @var float
     */
    private $longitude;
    /**
     * @var float
     */
    private $altitude;

    /**
     * Data constructor.
     */

    public function __construct()
    {
    }

    /**
     * This function allows you to save the information of data's activity in the attributes of that object
     *
     * @param int $activity data's activity id
     * @param string $timeD data's time
     * @param float $cardioFrequency data's heart rate
     * @param float $latitude data's latitude
     * @param float $longitude data's longitude
     * @param float $altitude data's altitude
     */

    public function init(int $activity, string $timeD, float $cardioFrequency, float $latitude, float $longitude, float $altitude)
    {
        $this->activity = $activity;
        $this->timeD = $timeD;
        $this->cardioFrequency = $cardioFrequency;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
    }

    /**
     * @return int
     */
    public function getIdActivityEntry(): int
    {
        return $this->idActivityEntry;
    }

    /**
     * @return int
     */
    public function getActivity(): int
    {
        return $this->activity;
    }

    /**
     * @return string
     */
    public function getTimeD(): string
    {
        return $this->timeD;
    }

    /**
     * @return float
     */

    public function getCardioFrequency(): float
    {
        return $this->cardioFrequency;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getAltitude(): float
    {
        return $this->altitude;
    }

}