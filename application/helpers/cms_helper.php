<?php
function judul($str)
{
    $jud = explode("_", $str);
    foreach ($jud as $judul) :
    echo ucfirst($judul) . " ";
    endforeach
    ;
}

function hari($hari)
{
    switch ($hari){
        case 0 : $hari="Minggu";
        Break;
        case 1 : $hari="Senin";
        Break;
        case 2 : $hari="Selasa";
        Break;
        case 3 : $hari="Rabu";
        Break;
        case 4 : $hari="Kamis";
        Break;
        case 5 : $hari="Jum'at";
        Break;
        case 6 : $hari="Sabtu";
        Break;
    }
    return $hari;
}