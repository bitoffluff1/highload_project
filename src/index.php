<?php
$link = mysqli_connect('172.19.0.2:3306', 'root', 'root_pwd', 'project');
$sql = "select * from customers where contactFirstName='Tony'";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo $row['customerName'];
}
