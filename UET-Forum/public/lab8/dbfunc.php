<?php
global $tablename;
$tablename='sinhvien';
function tft_add_row ($db, $tablename, $ma, $ten ) {
	echo $ma;
	mysqli_query ($db,"insert into sinhvien (id, name) values ('$ma', '$ten')");
}
function tft_update_row ($db,$tablename, $key, $ma, $ten ) {
	mysqli_query ($db,"update $tablename set id='$ma', name='$ten' where id='$key' ");
}

function tft_delete_row ($db, $tablename, $key ) {
	mysqli_query ($db,"delete from $tablename where id='$key'");
}

function tft_read_one ($db, $tablename, $key ) {
	return mysqli_query ($db,"select * from $tablename where id = '$key'");
}

function tft_read_some ($db,$tablename, $ma='', $ten='') {
	return mysqli_query ($db,"select * from $tablename where id like '%$ma%' and name like '%$ten%'");
}
function tft_read_all ($db,$tablename, $ma='', $ten='') {
	return mysqli_query ($db,"select * from $tablename");
}

function tft_read_other ($db,$tablename, $ma='') {
	return mysqli_query ($db, "select * from $tablename where id!='$ma' order by id");
}
?>