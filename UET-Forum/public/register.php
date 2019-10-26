<?php
//require_once("connect.php");
require("connect.php");
if(isset($_POST['submit'])){
    if( !empty($_POST['username']) && !empty($_POST['code']) && !empty($_POST['date']) && !empty($_POST['place'])){
        $username = $_POST['username'];
        $code = $_POST['code'];
        $date = $_POST['date'];
        $place = $_POST['place'];
        $username = trim($username);
        $username = preg_replace('([\s]+)', ' ', $username);
        $username = ucwords($username, " "); 
       
        $sql = "INSERT INTO `user`  (`username`,`code`,`date`,`place`)
                   VALUES ('$username','$code','$date','$place');";
       
        mysqli_query($connect,$sql);
        header('Location: http://forum.com.vn/view.php');
       
    }else echo "vui long nhap du du lieu";

}

?>