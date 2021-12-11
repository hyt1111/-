<?php

/***************　データベースへ接続、データベース選択　***************/
$s=mysql_connect("localhost","root","mysqlpass") or die("失敗です"); 
mysql_select_db("07rd000",$s);

/***************　NAMEがhのVALUEを変数$h_dに代入　***************/
$h_d=$_POST["h"];

/***************　$h_dがsel、ins、del、serのどれかで条件分岐　***************/
switch("$h_d"){

	case "bai":
		$J1=$_POST["J0"];
		
		$sql = "(SELECT C_Name FROM customer WHERE C_Yoshin >=$J1) UNION                                                     (SELECT C_Name FROM uriage WHERE C_Kingaku >=$J1)";
		$res = mysql_query($sql,$conn);		
//		mysql_query("DELETE FROM customer WHERE C_ID=$J1");
//		$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
		break;



	case "sel":
		$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
		break;

	case "ins":
		$a0_d=$_POST["a0"];
		$a1_d=$_POST["a1"];
		$a2_d=$_POST["a2"];
		$a3_d=$_POST["a3"];
		$a4_d=$_POST["a4"];
		mysql_query("INSERT INTO customer (C_ID,C_ID_Name,C_Name,C_Address,C_Yoshin) VALUES ('$a0_d','$a1_d','$a2_d','$a3_d','$a4_d')");
		$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
		break;

	case "del":
		$b1_d=$_POST["b1"];
		mysql_query("DELETE FROM customer WHERE C_ID=$b1_d");
		$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
		break;

	case "ser":
		$c1_d=$_POST["c1"];

	print $c1_d;
	print "<BR>";

		$re=mysql_query("SELECT * FROM customer WHERE C_ID LIKE '%$c1_d%' ORDER BY C_ID");
		break;
}

/***************　クエリの結果を表示　***************/
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

/***************　データベース切断　***************/
mysql_close($s);

/***************　トップページへのリンク　***************/
print "<BR><A HREF='kantan2.html'>トップメニューに戻ります</A>";
?>
