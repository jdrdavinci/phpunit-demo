<?php
/**
 * Created by PhpStorm.
 * User: jderuijter
 * Date: 14-3-2019
 * Time: 13:56
 */

use PHPUnit\Framework\TestCase;
use Demo\Car;

class CarTest extends TestCase
{
    protected $car;

    /**
     * @before
     */
    public function setup() {
        $this->car = new Car();
    }

    public function testTrueAssertsToTrue() {
        $this->assertTrue(true);
    }

    public function testHasPropertyModel() {
        $this->assertClassHasAttribute("currentSpeed", "Demo\Car");
    }

    public function testAccelerate() {
        $this->car->accelerate();
        $this->car->accelerate();
        $this->car->accelerate();
        $this->car->accelerate();
        $this->car->accelerate();

        $this->assertEquals(100, $this->car->currentSpeed);
    }

    public function testBrake() {
        $this->car->accelerate(250);
        $this->car->brake(10);

        $this->assertEquals(90, $this->car->currentSpeed);
    }

    public function testFullStop() {
        $this->car->accelerate(80);
        $this->car->fullStop();

        $this->assertEquals(0, $this->car->currentSpeed);
    }

    public function testThatBrandIsNotValid() {
        $this->car->brand = 'Ford';

        $this->assertNotContains($this->car->brand, Car::AVAILABLE_BRANDS);
    }

}