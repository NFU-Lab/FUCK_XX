<?php

use Illuminate\Database\Capsule\Manager as DB;

$n = $_POST["name"];

try {
    if (DB::table('class')->insert(array('name' => $n))) {
        exit(successResponse());
    } else {
        exit(failResponse("new failed"));
    }
} catch (\Throwable $e) {
    exit(failResponse("new failed"));
}
