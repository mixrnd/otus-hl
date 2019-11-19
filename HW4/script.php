<?php

$okTotal = 0;
$notOkTotal = 0;

$number = 1000;

for ($j = 0; $j < 5; $j++) {

    for ($i = 0; $i < 10; $i++) {
        $res = file_get_contents('http://sn.in:8080/test/insert?number=' . $number);
        $number++;

        if ($res == 'ok') {
            $okTotal++;
        } else {
            $notOkTotal++;
        }
    }
    sleep(1);
}

echo 'Results' . PHP_EOL;
echo 'success: ' . $okTotal . PHP_EOL;
echo 'errors: ' . $notOkTotal . PHP_EOL;
echo 'last number ' . $number . PHP_EOL;
