<?php

class Tools extends Nette\Object
{
    public static function weekRange($year, $week)
    {
        if($week < 10) $week = "0".$week;
        $result[0] = date("Y-m-d", strtotime("{$year}-W{$week}-1"));
        $result[1] = date("Y-m-d", strtotime("{$year}-W{$week}-7"));
        return $result;
    }
}
