<?php

namespace App\Tests\Unit;

use App\Car;
use App\Contracts\Truckable;
use App\Contracts\Vehicle;
use App\Exceptions\GarageMaxCapacity;
use App\Exceptions\InvalidFloorType;
use App\Floor;
use App\Garage;
use App\Slot;
use PHPUnit\Framework\TestCase;

class GarageTest extends TestCase
{
    public function test_should_return_an_exception_when_wrong_floor_type_is_given()
    {
        $this->expectException(InvalidFloorType::class);
        new Garage(['Wrong floor type']);
    }

    public function test_should_return_an_exception_when_garage_is_full()
    {
        $this->expectException(GarageMaxCapacity::class);

        $floors = [
            new Floor(1, [Vehicle::class, Truckable::class]),
            new Floor(1, [Vehicle::class]),
        ];

        $garage = new Garage($floors);
        for ($i = 0; $i < 5; $i++) {
            $car = new Car();
            $garage->park($car);
        }
    }

    public function test_should_return_a_slot_for_parking()
    {
        $floors = [
            new Floor(10, [Vehicle::class, Truckable::class]),
            new Floor(10, [Vehicle::class]),
        ];

        $slot = (new Garage($floors))->park(new Car());
        $this->assertInstanceOf(Slot::class, $slot);
    }
}