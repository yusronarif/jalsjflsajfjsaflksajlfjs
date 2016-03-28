<?php
/**
 * Custom HTML Helper
 *
 * @package        helper
 * @author         Much. Yusron Arif <yusron.arif4@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * Write HTML Elements
 *
 * Generates an HTML heading tag.  First param is the data.
 * Second param is the size of the heading tag.
 *
 * @access    public
 *
 * @param    string
 * @param    integer
 *
 * @return    string
 */
if (! function_exists('_echo')) {
    function _echo($str)
    {
        echo $str;
    }
}

/**
 * Write HTML Elements
 *
 * Generates an HTML heading tag.  First param is the data.
 * Second param is the size of the heading tag.
 *
 * @access    public
 *
 * @param    string
 * @param    integer
 *
 * @return    string
 */
if (! function_exists('_write')) {
    function _write($elm = null, $opt = null)
    {
        if (! isset($elm)) {
            echo '';

            return false;
        }
        $glue = "\n";
        if (isset($opt)) {
            if (is_array($opt)) {
                if (isset($opt["implode"])) {
                    $glue = $opt["implode"];
                }
            } else {
                $glue = $opt;
            }
        }

        if (is_array($elm)) {
            $elm = implode($glue, $elm);
        }
        echo $elm;
    }
}

/**
 * Write String into HTML as formatted strings
 *
 * Generates an HTML heading tag.  First param is the data.
 * Second param is the size of the heading tag.
 *
 * @access    public
 *
 * @param    string
 * @param    integer
 *
 * @return    string
 */
if (! function_exists('_e')) {
    function _e($str = null, $opt = null)
    {
        if (! isset($str)) {
            echo '';

            return false;
        }
        $glue = '<br />';
        if (isset($opt)) {
            if (is_array($opt)) {
                if (isset($opt["implode"])) {
                    $glue = $opt["implode"];
                }
            } else {
                $glue = $opt;
            }
        }

        if (is_array($str)) {
            $str = implode($glue, $str);
        }
        echo nl2br(stripslashes($str));
    }
}

/**
 * Write String into HTML as formatted strings
 *
 * Generates an HTML heading tag.  First param is the data.
 * Second param is the size of the heading tag.
 *
 * @access    public
 *
 * @param    string
 * @param    integer
 *
 * @return    string
 */
if (! function_exists('_f')) {
    function _f($str = null, $opt = null)
    {
        if (! isset($str)) {
            echo '';

            return false;
        }
        $glue = '<br />';
        if (isset($opt)) {
            if (is_array($opt)) {
                if (isset($opt["implode"])) {
                    $glue = $opt["implode"];
                }
            } else {
                $glue = $opt;
            }
        }

        if (is_array($str)) {
            $str = implode($glue, $str);
        }

        return nl2br(stripslashes($str));
    }
}