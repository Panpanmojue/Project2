<?php
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/upload.css">
    <script type="text/javascript" src="../JavaScript/city.js"></script>
    <meta charset="UTF-8">
    <title>Upload</title>
</head>
<body>
<ul class="navigation">
    <header>
        <h1>Welcome to the fantasy world!</h1>
    </header>
    <li><a class="active" href="../home.php" >Home</a></li>
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

<form action="upload2.php" method="post" enctype="multipart/form-data">
    <fieldset class="whole">
        <legend>Upload New Picture</legend>
        <div class="uploadPic">
            <img id="PicFromUser" src=""/>
            <p id="placeholder">No Picture Uploaded</p>
            <div class="wrap">
                <span>UPLOAD</span>
                <input type="file" name="photoUpload" id="file">
            </div>
        </div>

        <div class="main">
            <fieldset class="info">
                <h2>Picture Title:</h2>
                <div>
                    <label>
                        <input type="text" name="Title">
                    </label>
                </div>
            </fieldset>
            <br/><br/>
            <fieldset class="info">
                <h2>Picture Description:</h2>
                <div>
                    <label>
                        <input type="text" name="Description">
                    </label>
                </div>
            </fieldset>
            <br/><br/>
            <fieldset>
                <select name="Content">
                    <option value="default" selected>-Choose Content-</option>
                    <option value="Animals">Animals</option>
                    <option value="Buildings">Buildings</option>
                    <option value="People">People</option>
                    <option value="Scenery">Scenery</option>
                    <option value="Animation">Animation</option>
                </select>
            </fieldset>
            <fieldset>
                <select name="countries" id="countries" onchange="chooseCity(this,this.form.Cities)">
                </select>
                <select name="Cities" id="Cities">
                </select>
            </fieldset>

            <br/><br/>
        </div>
        <div id="bt">
            <a href="my_photo.php"> <button type="submit" value="SUBMIT" name="submit">SUBMIT</button></a>
            <!--
            <input type="button" value="SUBMIT" name="UploadSubmit" onclick="window.location.href='MyPhotos.html';alert('It has been uploaded');">
            -->
        </div>
    </fieldset>
</form>
</body>
<script type="text/javascript" src="../JavaScript/upload.js"></script>
<footer>
    Copyright.©2019-2021 PanpanMojue's world.All rights reserved.备案号：沪ILOVEPJ备19302010081号-1
</footer>
</html>
