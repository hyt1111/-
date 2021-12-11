<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** View05 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD000", $conn);


// テーブル名（Uriage & customer）の表示

$sql = "DROP VIEW View04";
$res = mysql_query($sql,$conn);


//$sql = "CREATE OR REPLACE VIEW View04 AS SELECT C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000 WITH CHECK OPTION";
/$sql = "CREATE OR REPLACE VIEW View04 AS SELECT C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000";
//$sql = "CREATE VIEW View04 AS SELECT C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000";
$res = mysql_query($sql,$conn);


//$sql = "CREATE OR REPLACE VIEW View04 AS SELECT C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000 WITH CHECK OPTION";
//$sql = "ALTER VIEW View04 AS SELECT C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000";
//$sql = "CREATE VIEW View04 AS SELECT C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000";
//$res = mysql_query($sql,$conn);


$sql = "INSERT INTO View04 VALUES(0,'条件外',100000)";
$res = mysql_query($sql,$conn);



$sql = "SELECT * FROM View04";
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
mysql_close($conn);

?>
</table></body></html>
