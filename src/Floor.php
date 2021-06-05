<?php

namespace App;

use App\Contracts\FloorInterface;
use App\Contracts\Vehicle;
use JetBrains\PhpStorm\Pure;

class Floor implements FloorInterface
{
    /**
     * @var $slots array
     */
    private array $slots = [];

    /**
     * Floor constructor.
     */
    public function __construct(
        private int $capacity = 10,
        private array $vehicleTypes = []
    )
    {
        $this->build();
    }

    /**
     * @return array
     */
    public function getSlots(): array
    {
        return $this->slots;
    }

    private function build()
    {
        for ($i = 0; $i < $this->capacity; $i++) {
            $this->slots[] = new Slot();
        }
    }

    #[Pure] public function findAvailableSlot(Vehicle $vehicle): ?Slot
    {
        /** @var Slot $slot */
        foreach ($this->slots as $slot) {
            if ($this->checkVehicleType($vehicle) && $slot->isAvailable()) {
                return $slot;
            }
        }

        return null;
    }

    private function checkVehicleType(Vehicle $vehicle): bool
    {
        foreach ($this->vehicleTypes as $vehicleType) {
            if ($vehicle instanceof $vehicleType) {
                return true;
            }
        }

        return false;
    }
}