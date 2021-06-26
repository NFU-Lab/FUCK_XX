<?php

use Illuminate\Database\Capsule\Manager as DB;

$c = $_POST["class"];

$d = DB::table('stu')->where(array('class' => $c))->get();
$data = array();
if (!(empty($d))) {
    foreach ($d as $i) {
        array_push($data, array(
            'name' => $i->name,
            'no' => $i->no,
            'seat' => $i->seat,
        ));
    }
}

exit(successResponse($data));