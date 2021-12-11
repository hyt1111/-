<?php
$s=mysqli_connect(“127.0.0.1","root","mysqlpass“, "13rd054") or die("失
敗です");
/*** NAMEがhのVALUEを変数$h_dに代入 ***/
$h_d=$_POST["h"];
/********** $h_dがsel、ins、del、serのどれかで条件分岐 **********/
switch("$h_d"){
case "sel":
	$re = mysqli_query($s, "SELECT * FROM customer ORDER BY C_ID");
	while($kekka = mysqli_fetch_array($re)) {
		print $kekka[0];
		print":";
		print $kekka[1];
		print":";
		print $kekka[2];
		print":";
		print $kekka[3];
		print"<BR>";
	}
	mysqli_close($conn);
	print"<br><A HREF = 'kantan2.html'>トップメニューに戻ります</A>";
	break;
case "ins":
	・・・・・・・・・・・・・・・・・・・;
	break;
case "del":
	・・・・・・・・・・・・・・・・・・・;
	break;
case "ser":
	・・・・・・・・・・・・・・・・・・・;
	break;
}
?>