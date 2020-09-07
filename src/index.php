<?php
$start = microtime(true);

$redis = new Redis();
$redis->connect('172.19.0.1', 6379);

if ($redis->get('customerName')) {
    var_dump(345);
    echo $redis->get('customerName');
} else {
    var_dump(123);
    $link = mysqli_connect('172.19.0.3:3306', 'root', 'qwerty', 'high_project');
    $sql = "select * from customers where contactFirstName='Tony'";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $redis->set('customerName', $row['customerName']);
        echo $row['customerName'];
    }
}

$time = microtime(true) - $start;
echo $time;
