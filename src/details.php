<?php

require_once('../config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/details.css">
    <meta charset="UTF-8">
    <title>Details</title>
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
<main>
    <div class="picture">
       <figure>
           <?php
           $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $ImageID = $_GET['id'];
           $sql = "SELECT * FROM travelimage where ImageID = '$ImageID'";
           $result = $pdo->query($sql);
           $row = $result->fetch();
           $img = '<img src="../images/travel-images/medium/' .$row['PATH']. '"> ';
           $sql2 = "select * from geocountries_regions where ISO = '{$row['Country_RegionCodeISO']}'";
           $result2 = $pdo->query($sql2);
           $row2 = $result2->fetch();
           $sql3 = "select * from geocities where GeoNameID = '{$row['CityCode']}'";
           $result3 = $pdo->query($sql3);
           $row3 = $result3->fetch();
               echo $img;
               echo '<figcaption>';
               echo '<fieldset class="details">';
               echo '<div class="picInfo">';
               echo '<table>';
               echo '<tr>';
               echo '<td>';
               echo '<p class="one">Content:</p>';
               echo '</td>';
               echo '<td>';
               echo $row['Content'];
               echo '</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<td>';
               echo '<p class="one">Country:</p>';
               echo '</td>';
               echo '<td>';
               echo $row2['Country_RegionName'];
               echo '</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<td>';
               echo '<p class="one">City:</p>';
               echo '</td>';
               echo '<td>';
               echo $row3['AsciiName'];
               echo '</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<td>';
               echo '<p class="one">Author:</p>';
               echo '</td>';
               echo '<td>';
               echo '<p class="two">unknown';
               echo '</td>';
               echo '</tr>';
               echo '<tr>';
               echo '<td>';
               echo '<p class="one">LikeNumber:</p>';
               echo '</td>';
               echo '<td>';
               echo $row['UID'];
               echo '</td>';
               echo '</tr>';
               echo '</table>';
               echo '</div>';
               echo '</fieldset>';
               echo '</figcaption>';
           ?>
       </figure>
    </div>
</main>



</body>
</html>
