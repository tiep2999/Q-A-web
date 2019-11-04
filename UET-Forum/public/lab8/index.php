<?php
include 'htmlfunc.php';
include 'dbfunc.php';

$db = mysqli_connect('127.0.0.1', 'root', '','labdemo');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_query($db,"SET NAMES 'utf8'");
mysqli_query($db,"SET CHARACTER SET 'utf8'");

global $cmd, $tablename, $ma, $ten, $rb, $c;
if(isset($_POST["cmd"])) $cmd=$_POST["cmd"];
if(isset($_POST["ma"])) $ma=$_POST["ma"];
if(isset($_POST["ten"])) $ten=$_POST["ten"];

if(isset($_POST["rb"])) $rb=$_POST["rb"];
if(isset($_POST["c"])) $c=$_POST["c"];


$tablename='sinhvien';	
$active_row = '';
	$errmess = '';
	if (isset($cmd))
		switch ($cmd) {
			case 'Nhập':
				if (isset ($ma) && isset ($ten) && ($ma!='') && ($ten!='')) {  
					if (isset($rb) && ($rb!='')) // Sửa
						tft_update_row ($db,$tablename, $rb, $ma, $ten);
					else // Thêm mới
						tft_add_row ($db,$tablename, $ma, $ten);
					$kq=tft_read_other ($db,$tablename, $ma);
					$active_row =  tr (td('1').td(cb('c['.$ma.']')).td(radio($ma, 'rb', '1')).td($ma).td('&nbsp;'.$ten, '', 'left'), 'center');
					$rb = $ma = $ten ='';
				} else {
					$errmess = 'Truong ten va ma phai khac rong!';
					$kq = tft_read_some ($db,$tablename);
				}
				break;
			case 'Xóa':
				if (isset ($c))
					foreach ($c as $key => $val) 
						tft_delete_row ($db,$tablename, $key);
				else 
					$errmess = 'Phai danh dau dong muon xoa';
				$kq = tft_read_some ($db,$tablename);
				$rb = $ma = $ten ='';
				break;
			case 'Tìm':
				$kq = tft_read_some ($db,$tablename, $ma, $ten);
				break;

} 		
	else { 
		if (isset($rb) && $rb!='') { // Nút chọn sửa được tích
			$temp = tft_read_one ($db,$tablename, $rb);
			$row = mysqli_fetch_array ($temp,MYSQLI_BOTH);
			$ma = $row ['id'];
			$ten = $row ['name'];
			$kq = tft_read_other ($db,$tablename, $ma);  // đọc các bản ghi mà id != $ma
			$active_row =  tr ( td('1').td(cb('c['.$ma.']')).td(radio($ma, 'rb', '1', $rb)).td($ma).td('&nbsp;'.$ten, '', 'left'), 'center');
		} else {
			$rb = $ma = $ten ='';
			$kq = mysqli_query ($db,"select * from sinhvien");
			}
	}	
	// Giao diện người dùng
	echo htOpen ('Quan ly danh sach '. $tablename);
	echo formOpen ();
	echo func_title ('Quản lý danh sách sinh viên');
	echo '<center>'. tblOpen ('60%');
	echo tr ( td('Tên sinh viên ', '35%') . td (textbox('ten', $ten, '30', '64'), '65%'));
	echo tr ( td('Mã sinh viên:') . td (textbox('ma', $ma, '4', '3')));
	echo tr ( td (cmd ('Nhập') .cmd ('Xóa') . cmd ('Tìm')) , 'center' );
	echo tblClose().'<br />';
	echo $errmess=='' ? '' : '<font color="RED">' . $errmess . '</font>'; 
	echo tblOpen ('60%', '1', '0');
	echo tr ( td('Stt', '10%') . td('&nbsp;', '5%'). td(radio ('', 'rb', '1', ''), '5%') . td('Mã sinh viên', '20%') . td('Tên sinh viên', '60%'), 'center');
	if ($active_row!='') { 
		echo $active_row;
		$ci = 2;
	} else 
		$ci= 1;
  
	while ($r = mysqli_fetch_array ($kq,MYSQLI_BOTH)) 
		echo tr ( td($ci++).td(cb('c['.$r['id'].']')).td(radio($r['id'], 'rb', '1', $rb)) . td($r['id']) . td('&nbsp;' . $r['name'], '', 'left'), 'center');
	echo tblClose().'</center>';
	echo formClose() . htClose();



		

?>
