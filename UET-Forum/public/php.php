<?php
	   $server ="forum.com.vn";
       $db = "lab_test";
       $username="root";
       $pass="";
   
       $connect = mysqli_connect($server,$username,$pass,$db) or die("không thể kết nối tới database");

       $sql="CREATE TABLE `user`(
        `id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `username` varchar(255) NOT NULL,
        `code` varchar(50) NOT NULL,
        `date` date,
        `place` varchar(255)
        );";

        $value = mysqli_query($connect,$sql);
        if($value) echo "Tao bang user thanh cong"; else echo "tao bang user that bai!";
?>