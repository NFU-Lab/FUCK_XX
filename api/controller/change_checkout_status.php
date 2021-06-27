<?php

use Illuminate\Database\Capsule\Manager as DB;

$u = $_POST["user"];
$c = $_POST["class"];
$s = $_POST["status"];
$d = $_POST["date"];

$r = DB::table('status')->where(array('stuno' => $u, 'class' => $c, 'date' => $d))->first();

try {
    if (empty($r)) {
        if (DB::table('status')->insert(array('stuno' => $u, 'class' => $c, 'date' => $d, 'status' => $s))) {
            exit(successResponse());
        } else {
            exit(failResponse("change status failed"));
        }
    } else {
        if (DB::table('status')->update(array('stuno' => $u, 'status' => $s, 'date' => $d))) {
            exit(successResponse());
        } else {
            exit(failResponse("change status failed"));
        }
    }
} catch (\Throwable $e) {
    exit(failResponse("change status failed"));
}
