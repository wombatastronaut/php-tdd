<?php

namespace App;

use \BadMethodCallException;

class Receipt
{
    /**
     * Get the total of the items
     * 
     * @param array $items
     * @param float $coupon
     * @return float
     */
   public function getTotal($items= [], $coupon)
   {
        if ($coupon > 1.00) {
            throw new BadMethodCallException('Coupon must be less than or equal to 1.00');
        }

        $result = array_sum($items);
        
        if ($coupon) {
            return $result - ($result * $coupon);
        }

        return $result;
   }

   /**
    * Get the total tax
    *
    * @param float $amount
    * @param float $tax
    * @return float
    */
   public function getTax($amount, $tax)
   {
       return $amount * $tax;
   }
}