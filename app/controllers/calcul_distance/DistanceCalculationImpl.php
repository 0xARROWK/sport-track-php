<?php
require_once "controllers/calcul_distance/DistanceCalculation.php";

/**
 * Class DistanceCalculationImpl
 */
class DistanceCalculationImpl implements DistanceCalculation
{
    /**
     * Return the distance in meters between two GPS points expressed in degrees.
     * @param float $lat1 Latitude of the first GPS point
     * @param float $long1 Longitude of the first GPS point
     * @param float $lat2 Latitude of the second GPS point
     * @param float $long2 Longitude of the second GPS point
     * @return float Distance between both GPS points
     */
    public static function calculateDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float
    {
        $R = 6378.137;
        $lat1 = deg2Rad($lat1);
        $long1 = deg2Rad($long1);
        $lat2 = deg2Rad($lat2);
        $long2 = deg2Rad($long2);

        $val = ($R * acos(sin($lat2) * sin($lat1) + cos($lat2) * cos($lat1) * cos($long2 - $long1)));

        return $val;
    }

    /**
     * Return the distance in meters of the course given in parameters. The course is defined by an ordered array of GPS points.
     * @param array $course The array containing GPS points
     * @return float The distance of the course
     */
    public static function calculatePathDistance(array $course): float
    {

        $distance = 0.0;
        for ($i = 0; $i < count($course) - 1; $i++) {
            $distance += DistanceCalculationImpl::calculateDistance2PointsGPS(htmlspecialchars($course[$i]['latitude']), htmlspecialchars($course[$i]['longitude']), htmlspecialchars($course[$i + 1]['latitude']), htmlspecialchars($course[$i + 1]['longitude']));
        }

        return $distance;
    }
}

