<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001")or die("失敗です");
$syori=$_POST["sousa"];

switch("$syori"){
    case "tuika":
        print($_POST['type_name']);
        $sql="alter table customer add ".$_POST['field_name']." ".$_POST['type_name']."(".$_POST['type_size'].")";
        print($sql);
        print("<br>");
        $re=mysqli_query($conn,$sql);
        $sql="UPDATE customer set ".$_POST['field_name']."='".$_POST['init']."'"; 
        print($sql);
        print("<br>");
        $re=mysqli_query($conn,$sql);
        break;
    case "syusei":
        
        break;
    case "sakujo":
        
        break;
    default:
        break;
}
$sql="SELECT * FROM customer";
$res=mysqli_query($conn,$sql);
print("<table border='1'>");
print("<tr>");
for($i=0;$i<mysqli_num_fields($res);$i++){
    $table_name=mysqli_fetch_field_direct($res,$i);
    print("<td>".$table_name->name."</td>");
}
print("</tr>");
while($row=mysqli_fetch_array($res)){
    print("<tr>");
    for($i=0;$i<mysqli_num_fields($res);$i++){
        print("<td>".$row[$i]."</td>");
    }
    print("</tr>");
}
print("</table>");
mysqli_close($conn);
print "<BR><A HREF='Jyoken003.php'>トップメニューに戻ります</A>";
?>