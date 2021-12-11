<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Union02 ***</title></head>
<body><table border="1">

<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");
$Table_name2 = "customer2";
$Table_name3 = "customer3";
// テーブル名設定（customer2) //
// テーブル名設定（customer3) //


// テーブル名（Uriage & customer2）の表示
$res = mysqli_query($conn,"(SELECT * FROM $Table_name2) UNION (SELECT * FROM $Table_name3)");


// $sql = "(SELECT FROM * $Table_name2) UNION (SELECT FROM * $Table_name3)"; //
//$res = mysql_query($sql,$conn); //

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
?>
</table></body></html>
