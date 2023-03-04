<?php

/**
 * Interface DistanceCalculation
 */
interface DistanceCalculation
{
    /**
     * Return the distance in meters between two GPS points expressed in degrees.
     * @param float $lat1 Latitude of the first GPS point
     * @param float $long1 Longitude of the first GPS point
     * @param float $lat2 Latitude of the second GPS point
     * @param float $long2 Longitude of the second GPS point
     * @return float Distance between both GPS points
     */
    public static function calculateDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float;

    /**
     * Return the distance in meters of the course given in parameters. The course is defined by an ordered array of GPS points.
     * @param array $course The array containing GPS points
     * @return float The distance of the course
     */
    public static function calculatePathDistance(array $course): float;
}


