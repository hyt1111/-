<meta http-equiv="content-type" content="text/html;charset=utf8">
<head><title>DataBase_Shukudai_4-3-uke
</title></head>

/*セレクトボックス、テキスト入力、変更ボタンがあり、セレクトボックスでＩＤを指定、
テキスト入力で新しい名前を入力できるようにする。変更ボタンを押すと、
そのＩＤに対する名前が、新しいものに変更される。*/
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass", "00rd001");

$ID = $_POST["number"];//numberとnamaeを受け取る
$Name = $_POST["namae"];

$sql = "UPDATE student SET Name='$Name' WHERE ID='$ID'";
$res = mysqli_query($conn, $sql);

if($res){
    print "変更に成功しました。<BR>";}
else {
    print "変更に失敗しました。<BR>";}
    
//mysqli_close($conn);はMysqlサーバから切断する関数
mysqli_close($conn);
print "<BR><A HREF='4-3-okuri.php'>戻る</A>";
?>