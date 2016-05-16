<?php
/**
 * Custom Date lite manipulation Helper
 *
 * @package        helper
 * @author         Much. Yusron Arif <yusron.arif4@gmail.com>
 */

if (! function_exists('date_db')) {
    function date_db($date = null, $_lang_ = 'id')
    {
        if (! $date) {
            return false;
        }

        if ($_lang_ == 'id') {
            list($d, $m, $y) = explode('-', $date);
        } else {
            list($m, $d, $y) = explode('-', $date);
        }

        return $y . '-' . $m . '-' . $d;
    }
}

/*
 * @param _datefull_ string format yyyy-mm-dd hh:mm:ss
 * @param _format_ string D(Default), S(Short), L(Long)
 * @param _show_ string B(both), D(date), T(time)
 * @param _lang_ string id(indonesia), en(english)
 * @return date long 7 juni 2006 21:30:00
 */
if (! function_exists('format_date')) {
    function format_date($date, $opt=[])
    {
        if(!$date) return false;

        $months = [
            'id' => [
                'medium' => ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nop', 'Des'],
                'long' => [
                    '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                    'Agustus', 'September', 'Oktober', 'Nopember', 'Desember',
                ],
            ],
            'en' => [
                'medium' => ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'long' => [
                    '', 'January', 'February', 'March', 'April', 'May', 'June', 'July',
                    'August', 'September', 'October', 'November', 'December',
                ],
            ],
        ];
        $days = [
            'id' => [
                'medium' => ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                'long' => ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            ],
            'en' => [
                'medium' => ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                'long' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            ],
        ];
        $par['lang'] = 'id';
        $par['show'] = 'short';
        $par['time'] = false;
        $par['day'] = false;

        if(count($opt)>0)
        {
            $par = array_merge($par, $opt);
        }

        if (strpos($date, ' ') !== false)
        {
            list ($_date, $_time) = explode(' ', $date);
        } else {
            $_date = $date;
            $_time = '';
        }

        list ($y, $m, $d) = explode('-', $_date);

        if($par['day']==true)
        {
            $dy = date('w', mktime(0,0,0,(int) $m,(int) $d,(int) $y));
            $str[] = $days[$par['lang']][in_array($par['show'], ['medium', 'long']) ? $par['show'] : 'long'][$dy]. ' ';
        }

        if(in_array($par['show'], ['medium', 'long']))
        {
            $str[] = $d. ' '. $months[$par['lang']][$par['show']][(int) $m]. ' '. $y;
        }
        else {
            $str[] = $d. '-'. $m. '-'. $y;
        }

        if($par['time']==true) $str[] = ' '. $_time;

        return implode('', $str);
    }
}
