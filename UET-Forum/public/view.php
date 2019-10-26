<html>
<head>
	<title>Tao form</title>
    <style>
    input{
        width:50%;
        height: 20px
    }


    .submit{
        width:auto;
        height: 20px
    }
    </style>
</head>
<body>
<?php
//require_once("connect.php");
require("connect.php");
require("lang.php");
$sqlU = "use lab_test;";
$value = mysqli_query($connect,$sqlU);
$sql = " SELECT * FROM user;";
$result = mysqli_query($connect,$sql);

// while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["date"]. "<br>";
// }
// die;
?>

<table border="1" style="width:100%;height:100px"  cellspacing="2px" cellpadding="2px">
     
    <thead>
    <tr>
      <th style="text-align: center;" colspan="6">Danh sach hoi vien</th>
    </tr>
  </thead>
    <tr>
        <td style="text-align: left;">Ma hoi vien</td>
        <td style="text-align: left;">Ten hoi vien</td>
        <td style="text-align: left;">Ngay tham gia</td>
        <td style="text-align: left;">Noi cong tac</td>
        <td style="text-align: center;" colspan="2">Hanh dong</td>
       
        
    </tr>

    <?php
    // session_start();
    // if (empty($_SESSION['token'])) {
    //     $_SESSION['token'] = bin2hex(random_bytes(32));
    // }
    $token = $_SESSION['token'];
     while($row = $result->fetch_assoc()) {
       echo  "<form action='forum.com.vn/register.php' method='post'>
       <tr>
       <input type='hidden' name='id' value=".$row['id'].">
        <td style='text-align: left;'><p>".$row['code']."</P></td>
        <td style='text-align: left;'><p>".$row['username']."</P></td>
        <td style='text-align: left;'><p>".$row['date']."</P></td>
        <td style='text-align: left;'><p>".$row['place']."</P></td>
        <td style='text-align: center;'><input class='submit' type='submit' name='submit' value='Xoa'></td>
        <td style='text-align: center;'><input class='submit' type='submit' value='Sua'></td>
        </tr>
        </form>";
     }
    ?>
    
</table>
</body>
</html>