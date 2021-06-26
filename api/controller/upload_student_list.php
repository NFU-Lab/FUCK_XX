<?php

use Illuminate\Database\Capsule\Manager as DB;

$c = $_POST["class"];

if ($_FILES["file"]["error"] > 0) {
    failResponse("错误：" . $_FILES["file"]["error"]);
} else {
    $file = fopen($_FILES["file"]["tmp_name"], "r");
    $data = array();
    $i = 0;
    while (!feof($file)) {
        $data[$i] = fgets($file);//fgets()函数从文件指针中读取一行
        $i++;
    }
    fclose($file);
    $data = array_filter($data);
    $string = "";
    foreach ($data as $l) {
        $string .= $l;
    }
    $json_a = json_decode($string, true);
    $arr = array();
    $i = 0;
    foreach ($json_a as $key => $value) {
        array_push($arr, array('name' => $key, 'no' => $value, 'class' => $c, 'seat' => $i));
        $i++;
    }
    try {
        if (DB::table("stu")->insert($arr)) {
            exit(successResponse());
        } else {
            exit(failResponse("import failed"));
        }
    } catch (\Throwable $e) {
        exit(failResponse("import failed"));
    }

}
exit();