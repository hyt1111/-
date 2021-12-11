<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** View04 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD001", $conn);


// テーブル名（Uriage & customer）の表示
//$sql = "(SELECT C_ID FROM Uriage) UNION (SELECT C_ID_Name FROM Customer)";

//$sql = "(SELECT X.C_Name,X.C_Yoshin,COUNT(*) FROM customer AS X JOIN customer2                                 AS Y WHERE X.C_Yoshin<=Y.C_Yoshin GROUP BY X.C_ID_Name)";

$sql = "DROP VIEW View04";
$res = mysql_query($sql,$conn);

//***　WITH CHECK OPTION があるとINSERTを実行しない　***

$sql = "CREATE VIEW View04 AS SELECT C_ID_Name,C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000 WITH CHECK OPTION";
//$sql = "CREATE VIEW View04 AS SELECT C_ID_Name,C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000";
//$sql = "CREATE VIEW View04 AS SELECT C_ID_Name,C_Name,C_Yoshin FROM customer";
$res = mysql_query($sql,$conn);


$sql = "INSERT INTO View04 VALUES(0,'条件外',100000)";


//$C_ID = 100;
//$C_Name = 'ADD-TEST';
//$C_Yoshin = 555555;


//$sql = "INSERT INTO view04(C_ID_Name,C_Name,C_Yoshin)
//VALUES ('$C_ID','$C_Name','$C_Yoshin')";

//mysql_query("INSERT INTO customer(C_ID,C_Name,C_Address,C_Yoshin)
//VALUES ('$C_ID','$C_Name','$C_Address','$C_Yoshin')");


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
