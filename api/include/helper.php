<?php

function successResponse(array $data = [], string $msg = 'ok', int $code = 0)
{
    return json_encode([
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ]);
}

function failResponse(string $msg = '', int $code = -1, array $data = [])
{
    return json_encode([
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    ]);
}