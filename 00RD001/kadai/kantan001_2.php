<html><meta http-equiv="content-type" content="text/html; charset=utf-8">
<head><title>***kantan001***</title></head>
<body>
    <?php
    $conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");
    
    $C_Name=$_POST["C_Name"];
    $G_Name=$_POST["G_Name"];
    $kosuu=$_POST["kosuu"];
    $total=$_POST["total"];
    $res=mysqli_query($conn,"SELECT * FROM goods WHERE G_Name='$G_Name'");
    $row=mysqli_fetch_array($res);
    if($row["G_ZAIKO"]>=$kosuu){
        mysqli_query($conn,"UPDATE goods SET G_ZAIKO=G_ZAIKO-$kosuu WHERE G_Name='$G_Name'");
        mysqli_query($conn,"UPDATE customer SET C_URI=C_URI+$total WHERE C_Name='$C_Name'");
        echo "処理が完了しました<br>";
    }else{
        echo "在庫が足りません<br>";
    }
    echo "<a href=kantan001.php>全画面に戻る</a>";
    ?>
</form>
</body>
</html>
