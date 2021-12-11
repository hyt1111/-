<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$conn=mysqli_connect("localhost","root","mysqlpass","15rd094") or die("失敗しました");
print "接続OK！<BR>";
$name00=$_POST["a0"];
$name01=$_POST["a1"];
$kazu01=$_POST["a2"];

$Table_name = "goods";
$res = mysqli_query($conn,"SELECT G_ZAIKO, G_Price  FROM $Table_name WHERE G_Name = '$name01'");
$Zaiko = mysqli_fetch_array($res);

if($_POST["a2"] <= $Zaiko[0]){
	print "<FORM METHOD='post' ACTION='kantan_insert02.php'>";
	print "商店名 <select NAME='a0'>";
	switch($name00) {
		case 'TDU商店':
			print "<option value='TDU商店' select>TDU商店</option>";
			break;
		case '高坂ストアー':
			print "<option value='高坂ストアー' select>高坂ストアー</option>";
			break;
		/*case '高坂ストアー':
			print "<option value='高坂ストアー' select>高坂ストアー</option>";
			break;*/
	}
	print "<option value='TDU商店' >TDU商店</option>";
	print "<option value='高坂ストアー'>高坂ストアー</option>";
	print "<option value='XXマート'>XXマート</option>";
	print "<option value='Great-A'>Great-A</option>";
	print "</select><BR>";
	print "商品名 <select NAME='a1'>";
	print "<option value='鉛筆'>鉛筆</option>";
	print "<option value='消しゴム'>消しゴム</option>";
	print "<option value='定規'>定規</option>";
	print "<option value='ノート'>ノート</option>";
	print "</select><BR>";
	print "個数 <INPUT TYPE='text' NAME='a2'><BR>";
	print "<INPUT TYPE='submit' VALUE='確認' disable><BR><BR>";

	print "単価 <INPUT TYPE='text' NAME='b0'><BR>";
	print "合計金額 <INPUT TYPE='text' NAME='b1'><BR>";
	print "<INPUT TYPE='submit' VALUE='実行'>";
	print "</FORM>";
}
else {
	print("在庫がありません。<br>");
	print($Zaiko[0]."<br>");
}
mysqli_close($conn);
print "<BR><A HREF='kantan01.html'>トップメニューに戻ります</A>";?>