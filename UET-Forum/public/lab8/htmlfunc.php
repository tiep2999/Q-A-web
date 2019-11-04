<?php
function htOpen ($title='Notitle', $bgcolor='', $basetarget='', $onload= '') {
	global $style;
	$bgcolor = ($bgcolor=='') ? '' : ' bgcolor='.$bgcolor;
	$basetarget = ($basetarget=='') ? '' : "<base target='$basetarget'>";
	$onload = ($onload=='') ? '' : ' onLoad=\''. $onload. '\'';
	return "<html><head><title>$title</title><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>{$basetarget}</head><body{$style}{$bgcolor}{$onload}>";
}

function htClose () {
	return '</body></html>';
}

function formOpen ($name='myform', $enctype='', $method='post', $action='') {
	global $style, $PHP_SELF;
	$enctype = ($enctype=='') ? '' : ' enctype="multipart/form-data"';
	$action = ($action=='') ? $PHP_SELF : $action;
	return "<form name='$name' method='$method' action='$action'{$enctype}{$style}>";
}

function formClose () {
	return '</form>';
}

function func_title ($title) {
	return "<div style='position: relative; text-align: right; font-weight:bold; color: BLUE' id='tieude'>$title<hr /></div>";
}

function textbox ($name='txt', $default='', $size='', $maxlength='') {
	global $style;
	$default = ($default=='') ? '' : " value='$default'";
	$size = ($size=='') ? '' : " size='$size'";
	$maxlength = ($maxlength=='') ? '' : " maxlength='$maxlength'";
	return "<input type='text' name='$name'{$default}{$size}{$maxlength}{$style} />";
}

function cb ($name='cb', $value='1', $currentval='') {
	$checked = ($value == $currentval) ? ' checked' : '';
	return "<input type='checkbox' name='$name' value='$value'{$checked} />";
}

function radio ($value='1', $name='rb', $submit='', $currentval='') {
	$submit = ($submit=='') ? '' : ' onClick="submit()"';
	$checked = ($value == $currentval) ? ' checked' : '';
	return "<input type='radio' name='$name' value='$value'{$submit}{$checked} />";
}

function cmd ($value='Ok', $name='cmd') {
	global $style;
	return "<input type='submit' name='$name' value='$value'{$style} /> ";
}

function button( $value= '   Ok   ', $script= '', $name= 'jbutton') {
	global $style;
	$script= empty( $script)? ' onClick= "history.go( -1)"': ' onClick= \''. $script. '\'';
	return '<input type="button" name="'. $name. '" value="'.$value. '"'.$style.$script. '>&nbsp;';
}

function hid( $name, $value) {
	return '<input type= "hidden" name="'.$name.'" value= "'.$value.'">';
}

function tblOpen ($width='100%', $border='0', $cellpadding='0', $cellspacing='0') {
	global $style;
	return "<table width='$width' border='$border' cellspacing='$cellspacing' cellpadding= 'cellpadding'{$style}>";
}

function tblClose () {
	return '</table>';
}

function tr ($content, $align='') {
	$align = ($align=='') ? '' : " align='$align'";
	return "<tr{$align}>$content</tr>";
}

function td ($content='&nbsp;', $width='', $align='', $colspan='', $rowspan='', $valign='') {
	global $style;
	$width = ($width=='') ? '' : " width='$width'";
	$align = ($align=='') ? '' : " align='$align'";
	$colspan = ($colspan=='') ? '' : " colspan='$colspan'";
	$rowspan = ($rowspan=='') ? '' : " rowspan='$rowspan'";
	$valign = ($valign=='') ? '' : " valign='$valign'";
	return "<td{$width}{$align}{$colspan}{$rowspan}{$valign}>$content</td>";
}
function list_box ($db,$tblname, $name='lb', $currentval='', $submit='', $fvalue='', $fdisplay='', $where='', $order='') {
	global $style;
	$submit = ($submit=='') ? '' : ' onChange="submit()"';
	$fvalue = ($fvalue=='') ? 'id' : $fvalue . ' as id';
	$fdisplay = ($fdisplay=='') ? 'name ' : $fdisplay . ' as name';
	$where = ($where=='')? '' : ' where '. $where;
	$order = ($order=='') ? '' : " order by id $order";
	$retval = "<select name='$name'{$style}{$submit}><option value=''>Chọn ... </option>";
	$kq = mysqli_query ($db,"select {$fvalue}, {$fdisplay} from $tblname{$where}{$order}") or die ("Lỗi truy xuất bảng $tblname trong list_box");
	while ($r = mysqli_fetch_array ($kq,MYSQLI_BOTH))
		$retval .= "<option value='{$r['id']}'" . ($r['id']==$currentval ? ' selected' : '') . ">{$r['name']}</option>";
	return $retval . '</select>';
}

function alert( $message = 'You are welcome!') {
	return 'window.alert("'. $message. '")';
}

function getdomain ($a_url = '') {
	// Vidu:  localhost/test/vidu.php => localhost/test
	global $PHP_SELF;
	$a_url = ($a_url=='') ? $PHP_SELF : $a_url;
	$n = strpos($a_url, '/', 1);
	return substr($PHP_SELF, 0, $n);
}

function baoloi ($errmess='You are here', $backtoid=0) {
	global $style;
	echo htOpen ('main') . formOpen('errmess') ;
	echo '<center><h4><font color=RED>'. $errmess . '</font></h4><br /><br />';
	echo button('Quay lại', 'jback (this.form, '.$backtoid.')') . hid('id', 0);
	echo formClose(). htClose ();
}

?>
<script>

function ltrim(astring) {
	while (astring.substring(0,1) == ' ') 
		astring = astring.substring(1, astring.length);
	return astring;
}

function rtrim(astring) {
	while (astring.substring(astring.length-1, astring.length) == ' ')
		astring = astring.substring(0,astring.length-1);
	return astring;
}

function trim(astring) {
	while (astring.substring(0,1) == ' ') 
		astring = astring.substring(1, astring.length);
	while (astring.substring(astring.length-1, astring.length) == ' ')
		astring = astring.substring(0,astring.length-1);
	return astring;
}

function isNumChar (astring) {
	var nchars = '0123456789';
	var retval = 1;
	for (var i=0; i<astring.length; i++) 
		if (nchars.indexOf (astring.charAt(0))<0) {
			retval = 0;
			break;
		}
	return retval;
}

function jback (obj, funcid) {
	obj.id.value=funcid;
	obj.submit();
}

function delete_confirm (obj) {
	var r=confirm("Bạn chắc chắn muốn xóa ???");
	if (r==true)  {
		obj.cmd.value = obj.jbutton.value;
		obj.submit();
	}
}

</script>
