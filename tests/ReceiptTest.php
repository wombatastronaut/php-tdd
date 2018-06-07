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

    /** 
     * @test
     * 
     * @dataProvider getTheTotalProvider
     */
    public function it_can_get_the_total($items, $expected)
    {
        $actual = $this->receipt->getTotal($items);

        $this->assertEquals(
            $expected,
            $actual,
            "It should return {$expected}"
        );
    }

    public function getTheTotalProvider()
    {
        return [
            [[1, 2, 3, 4, 5], 15],
            [[1, 3, 4, 4, 9], 21],
            [[2, 3, 4, 3, 3], 15]
        ];
    }

    /** @test */
    public function it_can_get_the_tax()
    {
        $expected = 1;
        $tax = 0.10;
        $amount = 10;

        $actual = $this->receipt->getTax($amount, $tax);

        $this->assertEquals(
            $expected,
            $actual,
            "It should return {$expected}"
        );
    }
}