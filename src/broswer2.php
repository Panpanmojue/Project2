<?php

$servername = "localhost";
$username = "xmj";
$password = "mypassword";
$dbname = "images";

//创建连接
$conn = new mysqli($servername,$username,$password,$dbname);
//检查连接
if ($conn->connect_error){
    die("连接失败：".$conn->connect_error);
}

$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "select * from travelimage where Title like '%{$search}%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){

    }
}
