<?php

require_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/home.css">
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<!--导航页-->
<ul class="navigation">
    <header>
        <h1>Welcome to the fantasy world!</h1>
    </header>
    <li><a class="active" href="home.php" >Home</a></li>
    <li><a href="src/browser.php">Browser</a></li>
    <li><a href="src/search.php">Search</a></li>
    <!--检查是否为登陆状态，是的话就产生一系列的下拉列表-->
    <?php
    session_start();
    if (isset($_SESSION['UserName'])){
        echo '             <div class="dropDown">
        <a href="#" class="dropBto">My account</a>
        <div class="dropContent">
            <a href="src/upload.php"> <img src="images/icons/upload.png" width="20" height="20" />Upload</a>
            <a href="src/my_photo.php"><img src="images/icons/myPhoto.png" width="20" height="20" />MyPhoto</a>
            <a href="src/favour.php"><img src="images/icons/favour.png" width="20" height="20" />MyFavour</a>
            <a href="src/logOut.html"><img src="images/icons/logIn.png" width="20" height="20" />LogOut</a>
        </div>
    </div>
        ';
    }
    else{
        echo ' <li><a href="src/logIn.html"/>LogIn</li>';
    }
    ?>
</ul>

<!--用于展示第一张图片的方法-->
<?php
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from travelimage order by rand() DESC limit 1";
    $result = $pdo->query($sql);
    while ($row = $result->fetch()) {
        $img = '<img src="images/travel-images/large/' .$row['PATH'].'" width="1247" height="800">' ;
    }
    $pdo = null;
?>
<div class="firstPic">
    <a  href="src/details.php">
        <?php
        echo $img;
        ?>
    </a>
</div>

<!--用于展示图片的函数-->
<?php
function showpic($uid){
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

    $sql = "SELECT Title,Description,PATH,ImageID FROM travelimage order by rand()";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $img = '<img src="images/travel-images/square-medium/' .$row['PATH'] .'">';
    constructLink($row['ImageID']);
    echo $img;
    echo '</a>';
    echo '<figcaption>
<h3>';
    constructLink($row['ImageID']);
    echo $row["Title"];
    echo '</a></h3>';
    echo '<div class="info">' .$row["Description"] ."</div>";
    echo '</figcaption>';
}

function constructLink($id){
    if (isset($_SESSION['UserName'])){
        echo '<a href="src/details.php?id=' .$id .'">';
    }else{
        echo '<a onclick="judge()">';
        echo '<script>
function judge() {
    alert("请先登陆！");
    history.go(-1);
}
';
        echo '</script>';
    }
}





?>


<div class="pics">
    <table>
        <tr>
            <td>
                <figure>
                    <?php
                    showpic(12);
                    ?>
                </figure>
            </td>
            <td>
                <figure>
                    <?php
                    showpic(2);
                    ?>
                </figure>
            </td>
            <td>
                <figure>
                    <?php
                    showpic(4);
                    ?>
                </figure>
            </td>
        </tr>

        <tr>
            <td>
                <figure>
                    <?php
                    showpic(5);
                    ?>
                </figure>
            </td>
            <td>
                <figure>
                    <?php
                    showpic(8);
                    ?>
                </figure>
            </td>
            <td>
                <figure>
                    <?php
                    showpic(9);
                    ?>
                </figure>
            </td>
        </tr>

        <tr>
            <td>
                <figure>
                    <?php
                    showpic(25);
                    ?>
                </figure>
            </td>
            <td>
                <figure>
                    <?php
                    showpic(random_int(1,25));
                    ?>
                </figure>
            </td>
            <td>
                <figure>
                    <?php
                    showpic(2);
                    ?>
                </figure>
            </td>
        </tr>
    </table>

</div>

<aside>
    <button class="toTop"><a href="home.php"><img src="../images/icons/toTop.gif" width="48" height="48"></a></button>
    <button class="refresh"><a href="home.php"><img src="../images/icons/refresh.gif" width="48" height="48"></a></button>
</aside>

<footer>
    <div>
        © 2020 爱睡觉的魔觉出品·沪 ICP 证 2002 号·沪 ICP安备20020502号 ·photo沪公网安备 19302010081 号出版物经营许可证
    </div>
    <div>
        <a href="https://mail.fudan.edu.cn">About us  · </a><a href="https://mail.fudan.edu.cn"> Contact us </a>
        <br/>
        <a href="https://mail.fudan.edu.cn">Email address:19302010081@fudan.edu.cn</a>
    </div>
</footer>


</body>
</html>

