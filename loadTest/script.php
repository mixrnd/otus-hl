<?php

function loadTest($graphPrefix)
{

    $resultsLatency = [];
    $resultsThroughput = [];
    $outputBuffer = '';
    foreach ([1, 10, 30, 50, 80, 100] as $connectionNumber) {
        $l = `wrk -c$connectionNumber -t1 --timeout 300s 'http://sn.in:8080/search?firstName=Mia&lastName=Hena'`;
        preg_match('/Latency\s+(\d*.\d*)([a-z]+)/', $l, $m);
        $rpsValue = (float)$m[1];
        $rpsMesurment = $m[2];
        if ($rpsMesurment === 's') {
            $rpsValue *= 1000;
        }
        $resultsLatency[] = $connectionNumber . ' ' . $rpsValue;

        preg_match('/Requests\/sec:\s+(\d+.\d+)/', $l, $t);
        $throughput = $t[1];
        $resultsThroughput[] = $connectionNumber . ' ' . $throughput;
        echo $l . PHP_EOL;
        echo '----------------------------------' . PHP_EOL;
        $outputBuffer .= $l . PHP_EOL;
        sleep(10);
    }

    file_put_contents("$graphPrefix-wrk.out", $outputBuffer);
    file_put_contents('latency.dat', implode(PHP_EOL, $resultsLatency));
    file_put_contents('throughtput.dat', implode(PHP_EOL, $resultsThroughput));

    `gnuplot -e "set terminal png size 800,800; set output '{$graphPrefix}_latancy.png'; set xlabel 'query number'; set ylabel 'response time'; plot 'latency.dat' with lines;"`;
    `gnuplot -e "set terminal png size 800,800; set output '{$graphPrefix}_throughtput.png'; set xlabel 'qery number'; set ylabel 'rps'; plot 'throughtput.dat' with lines;"`;
}

//loadTest('before');
loadTest('after');



