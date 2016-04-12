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
    function format_date($_datefull_, $_format_ = 'D', $_show_ = 'B', $_lang_ = 'id')
    {
        $monthName = array(
            'id' => array(
                'S' => array('', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nop', 'Des'),
                'L' => array(
                    '',
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'Nopember',
                    'Desember',
                ),
            ),
            'en' => array(
                'S' => array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
                'L' => array(
                    '',
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December',
                ),
            ),
        );

        if (isset($_datefull_)) {
            if (strpos($_datefull_, ' ') !== false) {
                list ($_date_, $_time_) = explode(' ', $_datefull_);
            } else {
                $_date_ = $_datefull_;
                $_time_ = '';
                $_show_ = 'D';
            }

            list ($_year_, $_month_, $_day_) = explode('-', $_date_);

            if ($_format_ == 'D') {
                if ($_lang_ == 'id') {
                    if ($_show_ == 'B' || $_show_ == 'D') {
                        $str[] = $_day_ . '-' . $_month_ . '-' . $_year_;
                    }
                } else {
                    if ($_show_ == 'B' || $_show_ == 'D') {
                        $str[] = $_month_ . '-' . $_day_ . '-' . $_year_;
                    }
                }
            } else {
                if ($_lang_ == 'id') {
                    if ($_show_ == 'B' || $_show_ == 'D') {
                        $str[] = $_day_ . ' ' . $monthName[$_lang_][$_format_][intval($_month_)] . ' ' . $_year_;
                    }
                } else {
                    if ($_show_ == 'B' || $_show_ == 'D') {
                        $str[] = $monthName[$_lang_][$_format_][intval($_month_)] . ', ' . $_day_ . ' ' . $_year_;
                    }
                }
            }
            if ($_show_ == 'B' || $_show_ == 'T') {
                $str[] = ' ' . $_time_;
            }

            return $str ? implode('', $str) : '';
        } else {
            return false;
        }
    }
}