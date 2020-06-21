<?php
include "../config.php";
session_start();
try {
    //连接数据库
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //得到用户的输入
    $uid = $_POST['user'];
    $_SESSION['UserName'] = $_POST['user'];
    $pwd = $_POST['userPassword'];
    $_SESSION['Pass'] = $_POST['userPassword'];
    if ($uid == "" || $pwd == ""){
        echo "<script>alert('用户名或密码不能为空！');history.go(-1);</script>";
    }
    else{
        //执行sql语句
        $sql_name = "select Pass from traveluser where UserName = '$uid'";
        $sql_email = "select Pass from traveluser where Email = '$uid'";
        $result1 = $pdo->query($sql_name);
        $result2 = $pdo->query($sql_email);
        $row1 = $result1->fetch();
        $row2 = $result2->fetch();
        if ($pwd == $row1[0] || $pwd == $row2[0]){
            echo "<script>location.href = '../home.php';</script>";
        }else {
            echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
        }
    }
    $pdo = null;
}catch (PDOException $e){
    die($e->getMessage());
}
?>