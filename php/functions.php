<?php
function fileLog($data) {
    if (!is_string($data)){
        $data = json_encode($data);
    }
    file_put_contents(__DIR__.'/log.txt', $data.PHP_EOL, FILE_APPEND);

}