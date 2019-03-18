<?php
/**
 * Created by PhpStorm.
 * User: jderuijter
 * Date: 18-3-2019
 * Time: 17:52
 */

namespace Demo;

/**
 * Class ParkingMachine
 * @package Demo
 */
class ParkingMachine
{
    const DUE_PER_HOUR = 2; // fixed due per hour

    /**
     * Currently parked cars; key/value pairs of license plate and start time.
     *
     * @var array
     */
    protected $parkedCars = [];

    /**
     * @param $licensePlate
     * @param $startTime
     * @return bool
     */
    public function checkIn($licensePlate, $startTime) {

        return true;
    }

    /**
     * @param $licensePlate
     * @return int
     */
    public function checkOut($licensePlate) {
        $parkingDue = 0;

        return $parkingDue;
    }

    /**
     * @param $licensePlate
     * @return array
     */
    public function status($licensePlate) {
        return ["startTime" => "parkingDue"];
    }

}