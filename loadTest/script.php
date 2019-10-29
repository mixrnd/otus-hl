<?php

$resultsLatency = [];
$resultsThroughput  = [];
foreach ([2, 10, 30, 50, 100 ] as $connectionNumber) {
    $l = `wrk -c$connectionNumber http://sn.in:8080/search?firstName=On`;
    preg_match('/Latency\s+(\d*.\d*)([a-z]+)/', $l, $m);
    $rpsValue = (float)$m[1];
    $rpsMesurment = $m[2];
    if ($rpsMesurment === 's') {
        $rpsValue *= 1000;
    }
    $resultsLatency[] = $connectionNumber . ' ' . $rpsValue;

    preg_match('/Transfer\/sec:\s+(\d+.\d+)/', $l, $t);
    $throughput = $t[1];
    $resultsThroughput[] = $connectionNumber . ' ' . $throughput;
    echo $l . PHP_EOL;
    echo '----------------------------------' . PHP_EOL;
    sleep(5);
}

//var_dump($resultsLatency);die;

file_put_contents('latency.dat', implode(PHP_EOL, $resultsLatency));
file_put_contents('throughtput.dat', implode(PHP_EOL, $resultsThroughput));

`gnuplot -e "set terminal png size 400,300; set output 'l.png'; set xlabel 'rps'; set ylabel 'response time'; plot 'latency.dat' with lines;"`;
`gnuplot -e "set terminal png size 400,300; set output 't.png'; set xlabel 'rps'; set ylabel 'MB'; plot 'throughtput.dat' with lines;"`;