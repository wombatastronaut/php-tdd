<?php

namespace Tests;

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Receipt;

class ReceiptTest extends TestCase
{
    public function setUp()
    {
        $this->receipt = new Receipt();
    }

    /** @test */
    public function it_can_get_the_total()
    {
        $expected = 15;
        $actual = $this->receipt->getTotal([2, 2, 3, 4, 5]);

        $this->assertEquals(
            $expected,
            $actual,
            "It should return {$expected}"
        );
    }
}