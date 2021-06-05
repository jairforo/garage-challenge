<?php

namespace App;

use App\Contracts\FloorInterface;
use App\Contracts\Vehicle;
use App\Exceptions\GarageMaxCapacity;
use App\Exceptions\InvalidFloorType;

class Garage
{
    /**
     * Garage constructor.
     */
    public function __construct(private array $floors)
    {
        $this->validateFloors();
    }

    /**
     * @throws InvalidFloorType
     */
    private function validateFloors(): void
    {
        foreach ($this->floors as $floor) {
            if (!$floor instanceof FloorInterface) {
                throw new InvalidFloorType('Invalid floor type');
            }
        }
    }

    /**
     * @throws GarageMaxCapacity
     */
    public function park(Vehicle $vehicle): Slot
    {
        $slot = $this->findAvailableSlot($vehicle);
        $slot->park();

        return $slot;
    }

    private function findAvailableSlot(Vehicle $vehicle): Slot
    {
        /** @var Floor $floor */
        foreach ($this->floors as $floor) {
            $slot = $floor->findAvailableSlot($vehicle);
            if ($slot instanceof Slot) {
                return $slot;
            }
        }

        throw new GarageMaxCapacity('The garage is full');
    }
}