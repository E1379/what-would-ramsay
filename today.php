<?php

$adages = file(__DIR__ . '/ramsay.txt');

function daysSinceDateWithoutWeekend($start) {
    $start  = DateTime::createFromFormat('Y-m-d', $start);
    $end    = new DateTime();
    $oneday = new DateInterval("P1D");
    $days = 0;
    foreach(new DatePeriod($start, $oneday, $end) as $day) {
        $day_num = $day->format("N"); /* 'N' number days 1 (mon) to 7 (sun) */
        if($day_num < 6) { /* weekday */
            $days++;
        } 
    }
    return $days;
}

echo $adages[daysSinceDateWithoutWeekend('2013-08-13') % 100];
