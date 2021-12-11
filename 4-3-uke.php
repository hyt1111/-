<?php
    $conn=mysqli_connect("localhost","root","mysqlpass","19rd142");
    $ID=$_POST['a0'];
    $Name=$_POST['a1'];
    $sql = "UPDATE student set Name='$Name' where ID=$ID";
    $res = mysqli_query($conn,$sql);
    print "変更に成功しました";
    print "<BR><A HREF='4-3-okuri.php'>戻る</A>";
    mysqli_close($conn);
?>