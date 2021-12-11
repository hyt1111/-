<?php
$s=mysql_connect("localhost","root","mysqlpass") or die("失敗です");
mysql_select_db("00rd000",$s);
/*** NAMEがhのVALUEを変数$h_dに代入***/
$h_d=$_POST["h"];
/********** $h_dがsel、ins、del、serのどれかで条件分岐**********/
switch("$h_d"){
case "sel":
print "接続完了。<BR>";
$sql = "SELECT C_Name as 会社名,C_Yoshin*100 as 与信
限度額FROM customer LIMIT 2 OFFSET 3";
$res = mysql_query($sql,$conn);
$sql = "SELECT AVG(C_Yoshin) FROM customer";
$res = mysql_query($sql,$conn);
print("<tr>");
for( $i = 0; $i < mysql_num_fields($res); $i++ ){
print( "<td>".mysql_field_name( $res, $i)."</td>" );
}
print("</tr>");
while($row = mysql_fetch_array($res)){
print("<tr>");
for( $i = 0; $i < mysql_num_fields($res); $i++ ){
print( "<td>".$row[$i]."</td>" );
}
print("</tr>");
}
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
print "<BR><A HREF='jouken.html'>トップメニュー</A>";
break;
}
?>