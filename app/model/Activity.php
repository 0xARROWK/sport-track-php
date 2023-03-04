<?php

/**
 * Class Activity : the activity of a sportsman
 */
class Activity
{
    /**
     * @var int
     */
    private $idActivity;
    /**
     * @var string
     */
    private $sportsman;
    /**
     * @var string
     */
    private $day;
    /**
     * @var string
     */
    private $description;
    /**
     * @var float
     */
    private $totalDistance;
    /**
     * @var float
     */
    private $maxFrequency;
    /**
     * @var float
     */
    private $minFrequency;
    /**
     * @var float
     */
    private $avgFrequency;
    /**
     * @var string
     */
    private $beginning;
    /**
     * @var string
     */
    private $ending;
    /**
     * @var float
     */
    private $totalTime;

    /**
     * This function allows you to sve the information of an activity in the attributes of that object.
     *
     * @param string $sportsman activity's sportsman
     * @param string $day activity's day
     * @param string $description activity's description
     * @param float $totalDistance activity's distance
     */
    public function init(string $sportsman, string $day, string $description, float $totalDistance)
    {
        $this->sportsman = $sportsman;
        $this->day = $day;
        $this->description = $description;
        $this->totalDistance = $totalDistance;
    }

    /**
     * Get id activity
     * @return int
     */
    public function getIdActivity(): int
    {
        return $this->idActivity;
    }

    /**
     * Get total distance
     * @return float
     */
    public function getTotalDistance(): float
    {
        return $this->totalDistance;
    }

    /**
     * Get total time
     * @return float
     */

    public function getTotalTime() : float
    {
        return $this->totalTime;
    }

    /**
     * Get sportsman
     * @return string
     */
    public function getSportsman(): string
    {
        return $this->sportsman;
    }

    /**
     * Get day
     * @return string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * Get description
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * get maximum frequency
     * @return float
     */
    public function getMaxFrequency(): float
    {
        return $this->maxFrequency;
    }

    /**
     * get minimum frequency
     * @return float
     */
    public function getMinFrequency(): float
    {
        return $this->minFrequency;
    }

    /**
     * get average frequency
     * @return float
     */
    public function getAvgFrequency(): float
    {
        return $this->avgFrequency;
    }

    /**
     * get beginning
     * @return string
     */
    public function getBeginning()
    {
        return $this->beginning;
    }

    /**
     * get ending
     * @return string
     */
    public function getEnding()
    {
        return $this->ending;
    }
}

