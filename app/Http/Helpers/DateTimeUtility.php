<?php
namespace App\Http\Helpers;

use \DateTime;
use \DateTimeZone;
use Session;

class DateTimeUtility
{
    public static function getDateTimeFormat($datetime, $format)
    {
        return date($format, strtotime($datetime));
    }

    public static function getTimeFormat($time, $format)
    {
        return date($format, strtotime(date('Y-m-d').' '.$time));
    }

    public static function getTwelveHoursTimeFormat($time)
    {
        return date("h:i a", strtotime($time));
    }

    public static function isDatePassed($fromdate, $todate)
    {
        return strtotime($fromdate)>strtotime($todate)|| strtotime($fromdate)==strtotime($todate);
    }

    public static function datePassed($fromdate, $todate)
    {
        $fromdate = new DateTime($fromdate);
        $todate = new DateTime($todate);
        return ((strtotime($fromdate->format('Y-m-d H:i:s'))>strtotime($todate->format('Y-m-d H:i:s'))) || (strtotime($fromdate->format('Y-m-d H:i:s'))==strtotime($todate->format('Y-m-d H:i:s'))));
    }

    public static function getDateTimeFormatToUTC($datetime, $format)
    {
        if (Session::has('timezone') && Session::get('timezone') != false) {
            $dt = new DateTime($datetime, new DateTimeZone(Session::get('timezone')));
            $dt->setTimezone(new DateTimeZone('UTC'));
            return $dt->format($format);
        } else {
            $dt = new DateTime($datetime);
            return $dt->format($format);
        }
    }

    public static function getDateTimeFormatToUserTimeZone($datetime, $format)
    {
        $dtm = new DateTime($datetime);
        if ($dtm->format('H:i:s')=='00:00:00'||$dtm->format('H:i:s')=='23:59:59') {
            return $dtm->format($format);
        } else {
            $dt = new DateTime($datetime, new DateTimeZone('UTC'));
            $dt->setTimezone(new DateTimeZone('Asia/Colombo'));
            return $dt->format($format);
        }
    }

    public static function getDateTimeDiffHistoryToUserTimeZone($value)
    {
        $now = new DateTime('NOW', new DateTimeZone('UTC'));
        $datetime = new DateTime($value, new DateTimeZone('UTC'));
        if ($now < $datetime) {
            return false;
        }
        $interval = $now->getTimeStamp() - $datetime->getTimeStamp();


        //$time = time() - $time; // to get the time since that moment
        $time = $interval;
        $time = ($time<1)? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) {
                continue;
            }
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }
    }
}