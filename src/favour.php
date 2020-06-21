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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/details.css">
    <meta charset="UTF-8">
    <title>MyFavour</title>
</head>
<body>
<ul class="navigation">
    <header>
        <h1>Welcome to the fantasy world!</h1>
    </header>
    <li><a href="../home.php" >Home</a></li>
    <li><a href="browser.php">Browser</a></li>
    <li><a href="search.php">Search</a></li>
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
<?php
$UserName = $_SESSION['UserName'];
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select * from traveluser where UserName = '$UserName'";
$result = $pdo->query($sql);
$row = $result->fetch();
$sql2 = "select * from travelimagefavor where UID = '{$row['UID']}'";
$result2 = $pdo->query($sql2);
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
while ($row2 = $result2->fetch()){
    $sql3 = "select * from travelimage where ImageID = '{$row2['ImageID']}'";
    $result3 = $pdo->query($sql3);
    $row3 = $result3->fetch();
    $img = '<img src="../images/travel-images/square-medium/'.$row3['PATH'].'">';



    echo '<fieldset>';
    echo '<div class="photo">';
    echo '<h2>My Favour</h2>';
    echo '<figure>';
    constructLink($row3['ImageID']);
    echo $img;
    echo '</a>';
    echo '<figcaption>';
    echo '<div class="title">'.$row3['Title'].'</div>';
    constructLink($row3['PATH']);
    echo '<div class="description">'.$row3['Description'].'</div>';
    echo '</a>';
    echo '</figcaption>';
    echo '</figure>';
    echo '</div>';
    echo '</fieldset>';

}
?>


<nav class="pageNumber">
    <?php
    $sql = "select * from travelimage where ImageID = '{$row2['ImageID']}'";
    $result1 = $conn->query($sql);
    $total_records = mysqli_num_rows($result1);//统计总共的记录条数
    $total_pages = ceil($total_records / $num_rec_per_page);//计算总页数

    echo "<a href='favour.php?page=1'>".'|<'."</a>";//跳转到第一页

    for ($i = 1;$i <= $total_pages;$i++){
        if ($i == $page){
            echo "<a href='favour.php?page=".$i."'class = 'pageOn'>".$i." </a>";
        }else{
            echo "<a href='favour.php?page=".$i."' class = 'page'>".$i." </a>";
        }

    }
    echo "<a href='favour.php?page=$total_pages'>".'>|'."</a>";//跳转到最后一页
    ?>
</nav>
<footer>
    Copyright.©2019-2021 PanpanMojue's world.All rights reserved.备案号：沪ILOVEPJ备19302010081号-1
</footer>
</body>

</html>