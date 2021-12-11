<html><meta http-equiv="content-type" content="text/html; charset=utf-8">
<head><title>*** Select (0) ***</title></head>
<body>
<table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","19rd142");
$Table_name = "NEW_customer";

// 条件に一致したレコードを削除
$sql = "DELETE FROM NEW_customer WHERE C_Yoshin<=150000";
$res = mysqli_query($conn,$sql);

// テーブル名(customer)の表示
$res = mysqli_query($conn,"SELECT * FROM $Table_name");

for( $i = 0; $i < mysqli_num_fields($res); $i++){
    $table_name = mysqli_fetch_field_direct($res, $i);
    print ("<td>".$table_name->name."</td>");
}

print("</tr>");
while($row = mysqli_fetch_array($res)){
    print("<tr>");
        for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
            print( "<td>".$row[$i]."</td>" );
            
        }
    print("</tr>");
}
?>
</table>
</body>
</html>

