<?php

namespace Tests;

require dirname(dirname(__FILE__)) . '/vendor' . '/autoload.php';

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
        $coupon = null;
        $actual = $this->receipt->getTotal($items, $coupon);

        $this->assertEquals(
            $expected,
            $actual,
            "It should return {$expected}"
        );
    }

    /** 
     * @test
     */
    public function it_can_get_the_total_and_coupon_with_exception()
    {
        $items = [1, 2, 3, 4, 5];
        $coupon = 1.20;

        $this->expectException('BadMethodCallException');
        $this->receipt->getTotal($items, $coupon);

    }

    public function getTheTotalProvider()
    {
        return [
            [[1, 2, 3, 4, 5], 15],
            [[0, 5, 7, 2, 5], 19],
            [[8, 2, 3, 1, 7], 21]
        ];
    }

    /** @test */
    public function it_can_get_the_tax()
    {
        $amount = 10.00;
        $tax = 0.10;

        $actual = $this->receipt->getTax($amount, $tax);

        $this->assertEquals(1.00, $actual);
    }

    public function tearDown()
    {
        unset($this->receipt);
    }
}