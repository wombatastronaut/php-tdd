<?php

namespace App;

class Receipt
{
    /**
     * Get the total of the items
     * 
     * @param Array $items
     * @return Int
     */
    public function getTotal($items = [])
    {
        return array_sum($items);
    }
}