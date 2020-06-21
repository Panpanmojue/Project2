<?php
include "../config.php";
try {
    //连接数据库
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //接收用户输入
    $uid = $_POST['userName'];
    $pwd = $_POST['userPassword'];
    $email = $_POST['userEmail'];
    $repwd = $_POST['repassword'];
    //检查用户注册的用户名是否已经被占用
    $sql = "select * from traveluser where UserName = '$uid'";
    //把结果传给rs
    $rs = $pdo->query($sql);
    //如果重复的话
    if ($rs->fetch()>0){
        echo "<script>alert('用户名已存在，请重新输入');history.go(-1)</script>";
    }
    else if ($repwd != $pwd){
        echo "<script>alert('两次密码输入不一致，请重新输入');history.go(-1)</script>";
    }
    else{
        //执行sql语句
        $sql = "insert into traveluser(Pass,UserName,Email) value ('$pwd','$uid','$email')";
        $res = $pdo->query($sql);//添加进入数据库
        var_dump($res);
        echo "<script>alert('恭喜您注册成功！');window.location.href = ('logIn.html')</script>";
    }
    $pdo = null;
}catch (PDOException $e){
    die($e->getMessage());
}
?>

