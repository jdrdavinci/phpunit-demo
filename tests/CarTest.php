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
    public function testTrueAssertsToTrue() {
        $this->assertTrue(true);
    }

    public function testHasPropertyModel() {
        $this->assertClassHasAttribute("model", "Demo\Car");
    }


    public function testIfBrandsAreValid() {
        $brands = ["Audi", "Volvo", "Ford"];

        foreach ($brands as $brand) {
            $this->assertContains($brand, Car::AVAILABLE_BRANDS);
        }
    }

}