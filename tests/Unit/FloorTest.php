<?php


namespace App\Tests\Unit;

use App\Car;
use App\Contracts\Carable;
use App\Contracts\Vehicle;
use App\Floor;
use App\Slot;
use App\Truck;
use PHPUnit\Framework\TestCase;

class FloorTest extends TestCase
{
    public function test_should_ensure_the_floor_has_the_correct_slot_capacity()
    {
        $floor = new Floor(3, [Vehicle::class]);
        $this->assertCount(3, $floor->getSlots());
    }

    public function test_should_return_an_instance_of_slot()
    {
        $floor = new Floor(1, [Vehicle::class]);
        $slot = $floor->findAvailableSlot(new Car());
        $this->assertInstanceOf(Slot::class, $slot);
    }

    public function test_should_return_null_in_case_no_supported_car_type_on_the_floor()
    {
        $floor = new Floor(1, [Carable::class]);
        $this->assertNull($floor->findAvailableSlot(new Truck()));
    }
}