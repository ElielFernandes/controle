<?php

namespace Classes;

class Math
{
    public $totalRevenue = 0;
    public $totalExpense = 0;
    public $balance = 0;

    public function balance ($data) 
    {
        foreach($data as $item)
        {
            if($item->getRevenue()==1)
            {
               $this->totalRevenue += $item->getValue();
            }
            else
            {
                $this->totalExpense += $item->getValue();
            }
        }
        $this->balance = $this->totalRevenue - $this->totalExpense;
    }

    static public function treatValue($value)
    {
        if($value < 0)
        {
            $value = $value * -1;
        }
        return $value;
    }
}