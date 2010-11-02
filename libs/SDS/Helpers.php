<?php

class Helpers
{
    public static function loader($helper)
    {
        $callback = callback(__CLASS__, $helper);
        if ($callback->isCallable()) {
            return $callback;
        }
    }

    public static function czDays($date)
    {
         $CZDays=Array("Mon"=>"PO",
                      "Tue"=>"ÚT",
                      "Wed"=>"ST",
                      "Thu"=>"ČT",
                      "Fri"=>"PÁ",
                      "Sat"=>"SO",
                      "Sun"=>"NE");
         return $CZDays[Date("D",$date)];
    }
}
