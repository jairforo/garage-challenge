<?php


namespace App\Tests\Unit;

use App\Slot;
use PHPUnit\Framework\TestCase;

class SlotTest extends TestCase
{
    public function test_should_ensure_change_slot_availability_to_false_park()
    {
        $slot = new Slot();
        $this->assertEquals(true, $slot->isAvailable());

        $slot->park();
        $this->assertEquals(false, $slot->isAvailable());
    }
}