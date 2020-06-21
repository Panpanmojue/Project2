<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/browser.css">
    <script type="text/javascript" src="../JavaScript/city.js"></script>
    <meta charset="UTF-8">
    <title>Browser</title>
</head>
<ul class="navigation">
    <header>
        <h1>Welcome to the fantasy world!</h1>
    </header>
    <li><a href="../home.php" >Home</a></li>
    <li><a class="active" href="browser.php">Browser</a></li>
    <li><a href="search.php">Search</a></li>
    <!--检查是否为登陆状态，是的话就产生一系列的下拉列表-->
    <?php
    session_start();
    if (isset($_SESSION["sessionUid"])){
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
<body>
<table class="main">
    <tr>
        <td class="left">
            <div class="hot" id="hotSearch">
                <form method="post" action="broswer2.php">
                    <h2>Search by Title</h2>
                        <input type="text" name="search">
                    <button type="submit" >
                </form>
            </div>
            <div class="hot" id="hotContent">
                <table>
                    <tr><h2>Hot Content</h2></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">Scenery</a></td></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">City</a></td></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">People</a></td></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">Animal</a></td></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">Building</a></td></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">Wonder</a></td></tr>
                    <tr><td><a href="favour.html" onclick="alert('search done')">City</a></td></tr>
                </table>
            </div>

            <div class="hot" id="hotCountry">
                <table>
                    <tr><h2>Hot Country</h2></tr>
                    <tr><td><a href="favour.html">China</a></td></tr>
                    <tr><td><a href="favour.html">India</a></td></tr>
                    <tr><td><a href="favour.html">Australia</a></td></tr>
                    <tr><td><a href="favour.html">America</a></td></tr>
                    <tr><td><a href="favour.html">Fiji</a></td></tr>
                </table>
            </div>
        </td>
        <td>
            <div class="filterResult">
                <section class="filter">
                    <form>
                        <fieldset>
                            <select name="Filter by Content">
                                <option value="default" selected>-Filter by Content-</option>
                                <option value="Animals">Animals</option>
                                <option value="Buildings">Buildings</option>
                                <option value="People">People</option>
                                <option value="Scenery">Scenery</option>
                                <option value="Animation">Animation</option>
                            </select>
                            <select name="Countries" id="Countries" onchange="chooseCity(this,this.form.Cities)">
                                <option value="default" selected>-Filter by Countries-</option>
                                <option value="China">China</option>
                                <option value="India">India</option>
                                <option value="Australia">Australia</option>
                                <option value="America">America</option>
                                <option value="Fiji">Fiji</option>
                            </select>
                            <select name="Cities" id="Cities">
                                <option value="default" selected>-Filter by Cities-</option>
                            </select>
                            <input type="button" value="Filter" onclick="alert('Filter done')">
                        </fieldset>
                    </form>
                </section>

                <div class="photo">
                    <table>
                        <tr>
                            <td>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/5856616479.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/5856654945.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/5856658791.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/5856697109.jpg"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/5857398054.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114850721.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114859969.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114867983.jpg"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114881215.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114904363.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114907897.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6114960821.jpg"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6115603234.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6119127716.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6119130918.jpg"></a>
                                <a href="details.html"><img src="../images/travel-images/square/square-medium/6119143988.jpg"></a>
                            </td>
                        </tr>
                    </table>
                    <nav class="pageNumber">
                        <a href="browser.html"><img class="icon" src="../images/icons/左.png" width="10px" height="10px"></a>
                        <a href="browser.html" class="page"><strong>1</strong></a>
                        <a href="browser.html" class="page">2</a>
                        <a href="browser.html" class="page">3</a>
                        <a href="browser.html" class="page">4</a>
                        <a href="browser.html" class="page">5</a>
                        <a href="browser.html"><img class="icon" src="../images/icons/右.png" width="10px" height="10px"></a>
                    </nav>
                </div>

            </div>
        </td>
    </tr>
</table>

</body>
<footer>
    Copyright.©2019-2021 PanpanMojue's world.All rights reserved.备案号：沪ILOVEPJ备19302010081号-1
</footer>
</html>
