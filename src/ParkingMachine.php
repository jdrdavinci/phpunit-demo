<?php
/**
 * Created by PhpStorm.
 * User: jderuijter
 * Date: 18-3-2019
 * Time: 17:52
 */

namespace Demo;
use Faker\Provider\DateTime;

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
     * Add license plate with the current timestamp to the parkedCars array.
     * @param $licensePlate
     * @param $startTime
     * @return bool
     */
    public function checkIn($licensePlate) {
        if (!isset($this->parkedCars[$licensePlate])) {
            $this->parkedCars[$licensePlate] = new \DateTime();
            return true;
        }
        return false;
    }

    /**
     * Check-out and calculate the parking due (first hour is free).
     * @param $licensePlate
     * @param $checkOutDate = null
     * @return int
     */
    public function checkOut($licensePlate, $checkOutDate = null) {
        $parkingDue = 0;

        // set default check-out date to tomorrow
        if ($checkOutDate === null) {
            $checkOutDate = new \DateTime("tomorrow");
        }

        if (!isset($this->parkedCars[$licensePlate])) {
            throw Exception('License plate '. $licensePlate . 'not parked!');
        }

        $checkInDate = $this->parkedCars[$licensePlate];
        $difference = $checkInDate->diff($checkOutDate);

        return $difference;
    }

    /**
     * Check the check-in time of the parked car.
     * @param $licensePlate
     * @return array
     */
    public function status($licensePlate) {
        if (!isset($this->parkedCars[$licensePlate])) {
            throw new \Exception('License plate '. $licensePlate . ' not parked!');
        }
        return $this->parkedCars[$licensePlate];
    }

}