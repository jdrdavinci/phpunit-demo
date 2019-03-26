<?php
/**
 * Created by PhpStorm.
 * User: jderuijter
 * Date: 14-3-2019
 * Time: 13:56
 */

use PHPUnit\Framework\TestCase;
use Demo\Car;

/**
 * Class CarTest. Used for testing methods of the class Demo\Car.
 */
class CarTest extends TestCase
{
    protected $car;

    /**
     * Setup a new car object for the tests.
     *
     * @before
     */
    public function setup() {
        $this->car = new Car();
    }

/*
    public function testTrueAssertsToTrue() {
        $this->assertTrue(true);
    }
*/

    /**
     * Test that the Car class has specific property (e.g. currentSpeed).
     */
    public function testHasPropertyModel() {
        $this->assertClassHasAttribute("currentSpeed", "Demo\Car");
    }

    /**
     * Test the acceleration of the car and that it does not exceed the speed limit.
     */
    public function testAccelerate() {
        $this->car->accelerate();
        $this->car->accelerate();
        $this->car->accelerate();

        $this->assertEquals(75, $this->car->currentSpeed);
    }

    /**
     * Test that car speed cannot exceed the speed limit (100).
     */
    public function testSpeedLimit() {
        $this->car->accelerate(200);

        $this->assertEquals(100, $this->car->currentSpeed);
    }

    /**
     * Test that the speeds of the car decreases after use the brakes.
     */
    public function testBrake() {
        $this->car->accelerate(250);
        $this->car->brake(10);

        $this->assertEquals(90, $this->car->currentSpeed);
    }

    /**
     * Test that the speed of the car becomes zero after doing a full stop.
     */
    public function testFullStop() {
        $this->car->accelerate(80);
        $this->car->fullStop();

        $this->assertEquals(0, $this->car->currentSpeed);
    }

    /**
     * Test that a brand (e.g. Ford) is not a valid card brand.
     */
    public function testThatBrandIsNotValid() {
        $this->car->brand = 'Ford';

        $this->assertNotContains($this->car->brand, Car::AVAILABLE_BRANDS);
    }

}