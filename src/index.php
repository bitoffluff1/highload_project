<?php
session_start();

$memcached = new Memcached();
$memcached->addServer('172.19.0.4', 11211);

echo '<pre>'; print_r($memcached->getServerList()); echo '</pre>';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';

var_dump($_SESSION);
