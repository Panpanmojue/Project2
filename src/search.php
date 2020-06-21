<?php
include "../config.php";
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
<br/>

<br/>

<footer>
    Copyright.©2019-2021 PanpanMojue's world.All rights reserved.备案号：沪ILOVEPJ备19302010081号-1
</footer>
</body>
</html>