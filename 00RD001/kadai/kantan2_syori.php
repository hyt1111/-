<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$s=mysql_connect("127.0.0.1","root","mysqlpass") or die("失敗です");
mysql_select_db("00rd000",$s);
/*** NAMEがhのVALUEを変数$h_dに代入***/
$h_d=$_POST["h"];

/********** $h_dがsel、ins、del、serのどれかで条件分岐**********/
/********** データの表示 **********/
switch("$h_d"){
case "sel":
print "接続完了。<BR>";
$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysql_fetch_array($re)){
print $kekka[0];
print " : ";
print $kekka[1];
print " : ";
print $kekka[2];
print " : ";
print $kekka[3];
print " : ";
print $kekka[4];
print "<BR>";
}

/********** データの入力 **********/
mysql_close($s);
print " <BR><A HREF='kantan2_syori.html'>トップメニュー</A> ";
break;
case "ins":
print "接続完了。<BR>";
$C_ID=$_POST["a0"]; $C_Name=$_POST["a1"];
$C_Address=$_POST["a2"]; $C_Yoshin=$_POST["a3"];
mysql_query("INSERT INTO customer(C_ID,C_Name,C_Address,C_Yoshin)
VALUES ('$C_ID','$C_Name','$C_Address','$C_Yoshin')");
$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysql_fetch_array($re)){
print $kekka[0]; print " : ";
print $kekka[1]; print " : ";
print $kekka[2]; print " : ";
print $kekka[3]; print "<BR>";
}

/********** データの削除 **********/
mysql_close($s);
print "<BR><A HREF='kantan2_syori.html'>トップメニュー</A>";
break;
case "del":
print "接続完了。<BR>";
$b1_d=$_POST["b1"];
mysql_query("DELETE FROM customer WHERE C_ID=$b1_d");
$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysql_fetch_array($re)){
print $kekka[0];
print " : ";
print $kekka[1];
print " : ";
print $kekka[2];
print "<BR>";
}

/********** 指定レコードデータの表示 **********/
mysql_close($s);
print "<BR><A HREF='kantan2_syori.html'>トップメニュー</A>";
break;
case "ser":
print "接続完了。<BR>";
$c1_d=$_POST["c1"];
$re=mysql_query("SELECT * FROM customer WHERE C_ID LIKE
'%$c1_d%'");
while($kekka=mysql_fetch_array($re)){
print $kekka[0];
print " : ";
print $kekka[1];
print " : ";
print $kekka[2];
print "<BR>";
}
mysql_close($s);
print "<BR><A HREF='kantan2_syori.html'>トップメニュー</A>";
break;
}
?>