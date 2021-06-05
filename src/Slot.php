<?php

namespace App;

class Slot
{
    private bool $isAvailable = true;

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    /**
     * @return Slot
     */
    public function park(): Slot
    {
        $this->isAvailable = false;
        return $this;
    }
}