<?php

function judul($str)
{
    return ucfirst(str_replace(['-', '_'], ' ', $str));
}

function hari($hari)
{
    $days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
    return $days[$hari];
}
