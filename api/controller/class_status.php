<?php

use Illuminate\Database\Capsule\Manager as DB;


$c = $_POST["class"];
$d = $_POST["date"];

$q = array('class' => $c);
if ($d >= -1) {
    $q["date"] = $d;
}

$cur = DB::table('status')->where($q)->get();
$arr = array();
foreach ($cur as $r) {
    array_push($arr, array(
        "status" => $r->status,
        "name" => $r->name,
        "class" => $r->class,
        "stu_no" => $r->stuno,
        "date" => $r->date,
    ));
}

exit(successResponse($arr));