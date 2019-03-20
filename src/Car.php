<?php
/**
 * Created by PhpStorm.
 * User: jderuijter
 * Date: 14-3-2019
 * Time: 13:57
 */

namespace Demo;

/**
 * Class Car
 * @package Demo
 */
class Car
{
    public $brand;
    public $currentSpeed;
    public $speedLimit = 100;

    const AVAILABLE_BRANDS = ['BMW', 'Audi', 'Volvo'];

    /**
     * @param int $speed
     * @return int
     */
    public function accelerate($speed = 25) {
        $this->currentSpeed += $speed;

        if ($this->currentSpeed > $this->speedLimit) {
            $this->currentSpeed = $this->speedLimit;
        }
        return $this->currentSpeed;
    }

    /**
     * @param int $speed
     * @return int
     */
    public function brake($speed = 10) {
        $this->currentSpeed -= $speed;

        if ($this->currentSpeed < 0) {
            $this->currentSpeed = 0;
        }
        return $this->currentSpeed;
    }

    /**
     * @return int
     */
    public function fullStop() {
        $this->currentSpeed = 0;
        return $this->currentSpeed;
    }

}