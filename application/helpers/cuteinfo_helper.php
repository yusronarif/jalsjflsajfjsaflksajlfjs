<?php
/**
 * Custom cute views Helper
 *
 * @package        helper
 * @author         Much. Yusron Arif <yusron.arif4@gmail.com>
 */

if (! function_exists('curr_format')) {
    function curr_format($curr = 0, $sym = false)
    {
        return ($sym?'Rp. ':'').number_format($curr, 0, ',', '.');
    }
}