<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function numberFormat($angka) {
    {
        return 'Rp. ' . number_format($angka, 0, ',', '.');
    }
}
}
