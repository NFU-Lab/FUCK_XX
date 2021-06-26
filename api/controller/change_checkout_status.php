<?php

use Illuminate\Database\Capsule\Manager as DB;

$u = $_POST["user"];
$c = $_POST["class"];
$s = $_POST["status"];
$d = $_POST["date"];

$r = DB::table('status')->where(array('user' => $u, 'class' => $c, 'date' => $d))->first();

try {
    if (empty($r)) {
        if (DB::table('status')->insert(array('user' => $u, 'class' => $c, 'date' => $d, 'status' => $s))) {
            exit(successResponse());
        } else {
            exit(failResponse("change status failed"));
        }
    } else {
        if (DB::table('status')->update(array('status' => $s, 'date' => $d))) {
            exit(successResponse());
        } else {
            exit(failResponse("change status failed"));
        }
    }
} catch (\Throwable $e) {
    exit(failResponse("change status failed"));
}
