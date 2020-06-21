<?php
session_start();
include "../config.php";
try{
    //连接数据库
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fileName = $_FILES['photoUpload']['name'];
    //$type = $_FILES['file']['type'];
    $tmp_name = $_FILES['photoUpload']['tmp_name'];
    //得到用户的输入
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Content = $_POST['Content'];
    $Country = $_POST['countries'];
    $City = $_POST['Cities'];
    //$PATH =

    if ($Title == "" || $Description == "" || $Country == "" || $Content == "" || $Country == "" || $City == ""){
        echo '<script>alert("请输入完整的信息！");history.back();</script>';
    }else{
        //获取上传图片Country_RegionCodeISO
        $sql_country = "select * from geocountries_regions where Country_RegionName = '{$Country}'";
        $result_country = $pdo->query($sql_country);
        $row_country = $result_country->fetch();
        $Country_RegionCodeISO = $row_country['ISO'];

        //获取上传图片CityCode
        $sql_city = "select * from geocities where AsciiName = '{$City}'";
        $result_city = $pdo->query($sql_city);
        $row_city = $result_city->fetch();
        $CityCode = $row_city['GeoNameID'];

        //获取上传图片UID
        $sql_user = "select * from traveluser where UserName = '{$_SESSION['UserName']}'";
        $result_user = $pdo->query($sql_user);
        $row_user = $result_user->fetch();
        $UID = $row_user['UID'];

        //获取上传图片的ImageID
        $sql_max_ImageID = "select max(ImageID) from travelimage ";
        $result_max_ImageID = $pdo->query($sql_max_ImageID);
        $row_max_ImageID = $result_max_ImageID->fetch();
        $ImageID = (int)$row_max_ImageID[0] + 1;

        //将图片数据上传到数据库
        $sql = "insert into travelimage(ImageID,UID,Title,PATH,Description, CityCode,Country_RegionCodeISO,Content) values('$ImageID','$UID','$Title','upload/$fileName','$Description','$CityCode','$Country_RegionCodeISO','$Content')";
        $res = $pdo->query($sql); //添加


        //保存文件名到文件夹
        move_uploaded_file($tmp_name,"../images/travel-images/square-medium/upload/".$fileName);
        $a = "../images/travel-images/square-medium/upload/".$fileName;
        $filePath = array();//文件路径数组
        function traverse($path = '.'){
            global $filePath;//得到外部定义的数组
            $current_dir = opendir($path); //opendir();返回一个目录语柄，失败返回false
            while (($file = readdir($current_dir)) != false){  //readdir()返回打开目录句柄中的一个条目
                $sub_dir = $path . DIRECTORY_SEPARATOR . $file;//构建子目录路径
                if ($file == '.' || $file == '..'){
                    continue;
                }else if (is_dir($sub_dir)){  //如果是目录，进行递归
                    echo 'Directory ' . $file . ':'; //如果是文件夹。输出文件夹名称
                    traverse($sub_dir);  //嵌套遍历子文件夹
                }else{ //如果是文件，直接输出路径和文件名
                    echo '../' .$file . "<br/>";
                    $filePath[$path . '/' . $file] = '../images/travel-images/square-medium/upload' . $file;//把文件路径复值给数组
                }
            }
            return $filePath;
        }
        $array = traverse("../images/travel-images/square-medium/upload");



    }



}catch (PDOException $e){
    die($e->getMessage());
}
?>
