<html><meta http-equiv="content-type" content="text/html;charset=utf8">
<head><title>DataBase_Shukudai_4-3-okuri
</title></head><body>
<table border="1">


<?php
	Print"hpMyAdminを用いて、データベースに以下のテーブルStudentを追加する";
	Print"<br>";
	Print"このStudentの内容を修正できるページを作成せよ＊＊＊";
	Print"<br>";



$conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");
$Table_name = "student";
$res = mysqli_query($conn,"(SELECT ID, Name as 名前 FROM $Table_name )");

//表示テンプレート
print("<tr>");
for( $i = 0 ; $i < mysqli_num_fields($res) ; $i++){
	$table_name = mysqli_fetch_field_direct($res, $i);
	print ("<td>".$table_name->name."</td>");}
print("</tr>");
while($row = mysqli_fetch_array($res)){
	print("<tr>");
	for( $i = 0 ; $i < mysqli_num_fields($res) ; $i++ ){
		print( "<td>".$row[$i]."</td>" );}
print("</tr>");}
//表示テンプレート
?>

<FORM method="post" action="4-3-uke.php">
//メゾット
<select name="number">/*選択したナンバーを送る*/
<option value="1">1</option>	/*"1"が送られるから余計なものを入れてはいけない*/
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>

<INPUT TYPE="text" NAME="namae">/*nameを送る*/
<INPUT TYPE="submit" VALUE="変更">
</FORM>
</table></body></html>