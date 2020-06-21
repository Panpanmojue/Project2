<?php
require_once('../config.php');
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

$num_rec_per_page = 3;//每页显示数量
if (isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$start_from = ($page - 1) * $num_rec_per_page;

$keyTitle = isset($_POST['keyTitle'])? $_POST['keyTitle'] : $_GET['keyTitle'];
$keyDes = isset($_POST['keyDes'])? $_POST['keyDes'] : $_GET['keyDes'];
$sql = "select * from travelimage where Title like '%{$keyTitle}%' or Description like '%{$keyDes}%'  LIMIT $start_from,$num_rec_per_page";
$result1 = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/search.css">
    <meta charset="UTF-8">
    <title>Search</title>
</head>
<body>
<ul class="navigation">
    <header>
        <h1>Welcome to the fantasy world!</h1>
    </header>
    <li><a href="../home.php" >Home</a></li>
    <li><a href="browser.php">Browser</a></li>
    <li><a class="active" href="search.php">Search</a></li>
    <!--检查是否为登陆状态，是的话就产生一系列的下拉列表-->
    <?php
    session_start();
    if (isset($_SESSION['UserName'])){
        echo '             <div class="dropDown">
        <a href="#" class="dropBto">My account</a>
        <div class="dropContent">
            <a href="upload.php"> <img src="../images/icons/upload.png" width="20" height="20" />Upload</a>
            <a href="my_photo.php"><img src="../images/icons/myPhoto.png" width="20" height="20" />MyPhoto</a>
            <a href="favour.php"><img src="../images/icons/favour.png" width="20" height="20" />MyFavour</a>
            <a href="logOut.html"><img src="../images/icons/logIn.png" width="20" height="20" />LogOut</a>
        </div>
    </div>
        ';
    }
    else{
        echo ' <li><a href="logIn.html"/>LogIn</li>';
    }
    ?>
</ul>
<br/>
<section id="search">
    <form action="search2.php" method="post">
        <fieldset>
            <h2>Search</h2>
            <div>
                <label id="titleSearch">
                    <input type="radio" name="searchMethod" value="Search by Title:" checked>
                    Search by Title:<br/>
                    <input type="text" id="searchByTitle" name="keyTitle"><br/>
                </label>
                <label id="descriptionSearch">
                    <input type="radio" name="searchMethod" value="Search by Description:">
                    Search by Description:<br/>
                    <input type="text" name="keyDes">
                </label>
            </div>
            <div id="bt">
                <br/>
                <button type="submit" name="filter" value="Filter">Filter</button>
                <!--
                <input type="button" name="filter" value="Filter" onclick="alert('Filter done')">
                -->
            </div>
        </fieldset>
    </form>
</section>
<fieldset>
    <div class="photo">
        <h2>Search Result</h2>
        <?php
        function constructLink($id){
            if (isset($_SESSION['UserName'])){
                echo '<a href="details.php?id=' .$id .'">';
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

        if ($result1->num_rows>0){
            //输出数据
            while ($row = $result1->fetch_assoc()){
                $img = '<img src="../images/travel-images/small/'.$row['PATH'] .'">';
                echo '<figure>';
                constructLink($row['ImageID']);
                echo $img;
                echo '</a>';
                echo '<figcaption>';
                echo '<div class="title">'.$row['Title'].'</div>';
                constructLink($row['ImageID']);
                echo '<div class="description">'.$row['Description'].'</div>';
                echo '</a>';
                echo '</figcaption>';
                echo '</figure>';
                echo '<hr/>';
            }
        }
        ?>

    </div>
</fieldset>

<br/>

<nav class="pageNumber">
    <?php
    $sql = "select * from travelimage where Title like '%{$keyTitle}%' or Description like '%{$keyDes}%'";
    $result1 = $conn->query($sql);
    $total_records = mysqli_num_rows($result1);//统计总共的记录条数
    $total_pages = ceil($total_records / $num_rec_per_page);//计算总页数


    echo "<a href='search2.php?page=1&keyTitle=".$keyTitle."&keyDes=".$keyDes."'>".'|<'."</a>";//跳转到第一页

    for ($i = 1;$i <= $total_pages;$i++){
        if ($i == $page){
            echo "<a href='search2.php?page=".$i."&keyTitle=".$keyTitle."&keyDes=".$keyDes."' class = 'pageOn'>".$i." </a>";
        }else{
            echo "<a href='search2.php?page=".$i."&keyTitle=".$keyTitle."&keyDes=".$keyDes."' class = 'page'>".$i." </a>";
        }

    }
    echo "<a href='search2.php?page=$total_pages&keyTitle=".$keyTitle."&keyDes=".$keyDes."'>".'>|'."</a>";//跳转到最后一页
    ?>
</nav>
<footer>
    Copyright.©2019-2021 PanpanMojue's world.All rights reserved.备案号：沪ILOVEPJ备19302010081号-1
</footer>
</body>
</html>

