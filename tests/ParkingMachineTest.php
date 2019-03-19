<?php
/**
 * Created by PhpStorm.
 * User: jderuijter
 * Date: 18-3-2019
 * Time: 22:27
 */

use PHPUnit\Framework\TestCase;
use Demo\ParkingMachine;

class ParkingMachineTest extends TestCase
{
    protected $licensePlateOne = 'XYZ';
    protected $parkingMachine;

    /**
     * @before
     */
    public function setup() {
        $this->parkingMachine = new ParkingMachine();
    }

    public function testThatCarIsNotParked() {
        $this->expectException(\Exception::class);
        $this->parkingMachine->status($this->licensePlateOne);
    }

    public function testThatCarIsParked() {
        $this->parkingMachine->checkIn($this->licensePlateOne);
        $this->assertInstanceOf(
            \DateTime::class,
            $this->parkingMachine->status($this->licensePlateOne)
        );
    }

    public function testThatDueIsZero() {
        $this->parkingMachine->checkIn($this->licensePlateOne);
        $this->assertTrue($this->parkingMachine->checkOut($this->licensePlateOne));
    }

}