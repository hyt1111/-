<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>テーブル操作プログラム</title>
</head>
<body>
<?php
   $f_operate = $_POST[field_operate];
   $f_name= $_POST[field_name];
   $f_model = $_POST[field_model];
   $f_size = $_POST[field_size];
   $f_default = $_POST[field_default];
   $f_option = $_POST[field_option];
   $f_current = $_POST[current_field_name];

   $r_operate = $_POST[record_operate];
//   $r_name= $_POST[record_name];
//   $r_model = $_POST[record_model];
//   $r_size = $_POST[record_size];
//   $r_default = $_POST[record_default];
//   $r_current = $_POST[current_record_name];

   print "<h1>実行結果</h1>";
   //*******************************************************************
   $s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
   mysql_select_db("00rd001",$s);
   //*******************************************************************
   
   //=====================================================
   //テーブル操作プログラム
   switch($f_operate){
      case "add":
	     break;
      case "revise":
	     break;
      case "delete":
	     //関係のない引数は""に変更
         $f_name= "";
         $f_model = "";
         $f_size = "";
         $f_default = "";
         $f_option = "";
         //******************************
         $sql = "alter table customer drop $f_current";
         $res = mysql_query($sql,$s);
         //******************************
		 print "フィールド$f_currentを削除しました。<br>";
	     break;
      default:
	     break;
   }

   //最後にパラメタを文字列に変換する


   print "--------------------------条件--------------------------<br>";
   print "********フィールド********<br>";
   print "操作=$f_operate<br>";
   print "フィールド名=$f_name<br>";
   print "型名=$f_model<br>";
   print "型サイズ=$f_size<br>";
   print "初期値=$f_default<br>";
   print "オプション=$f_option<br>";
   print "現フィールド名=$f_current<br>";
   print "<br>";

   print "********レコード********<br>";
   print "操作=$r_operate<br>";
   print "<br>";
   
   print "<br>";
   print "<form method='post' action='jyoken03.php'>";
   print "<input type='submit' name='back' value='条件指定画面に戻る'>";
   print "</form>";
?>
</body>
</html>
