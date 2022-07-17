<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function tanggal($date, $date_format)
{
    return Carbon::parse($date)->isoFormat($date_format);
}

function localDate($date, $date_format)
{
    return Carbon::parse($date)->translatedFormat($date_format);
}

function customDate($date, $date_format)
{
    return Carbon::parse($date)->format($date_format);
}

function dateHuman($date)
{
    return Carbon::parse($date)->diffForHumans();
}

function tanggalSekarang($date_format)
{
    return Carbon::now()->format($date_format);
}

function rupiah($number)
{
    return "Rp " . number_format($number, 0, ',', '.');
}
function persen($number)
{
    return ($number) . " %";
}


function separate_array($param)
{
    return implode('|', $param);
}

function explode_string($param)
{
    return explode('|', $param);
}

function convert_to_slug($param)
{
    return Str::slug($param);
}

function capitalEachWords($words)
{
    return ucwords(strtolower($words));
}
