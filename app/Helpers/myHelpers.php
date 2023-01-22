<?php

use Illuminate\Support\Facades\DB;

function anyoActual() {
    $anyo = DB::get('YEAR(NOW()');
    return $anyo;
}
