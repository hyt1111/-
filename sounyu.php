<?php
$conn=mysqli_connect("127.0.0.1","root","mysqlpass","19rd142") or die("失敗です");
mysqli_set_charset($conn,"utf8");
print"成功しました";
mysqli_query($conn,"INSERT INTO customer(C_ID,C_Name,C_Address,C_Yoshin,C_Other) VALUES(50,'サカド新店舗','埼玉県比企郡鳩山町石坂','800000','特記なし')");
mysqli_close($conn);
?>