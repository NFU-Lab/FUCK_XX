<?php

use Illuminate\Database\Capsule\Manager as DB;

$data = array();

$r = DB::table('class')->get();

foreach ($r as $i) {
    array_push($data, array(
        'name' => $i->name,
        'id' => $i->id
    ));
}
exit(successResponse($data));