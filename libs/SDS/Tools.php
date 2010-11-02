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

    public static function getAllDaysofWeek($year,$week)
    {
        $days = array();
        for($day=1; $day<=7; $day++)
        {
            $days[$day] = date('Y-m-d', strtotime($year."W".$week.$day))."\n";
        }
        return $days;
    }
}
