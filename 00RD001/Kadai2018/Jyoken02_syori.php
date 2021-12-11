<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>条件指定検索プログラム２</title>
</head>
<body>
<?php
   print "<h1>検索結果</h1>";

  if(!empty($_POST["order"])){ $order = $_POST["order"]; } else { $order = "No_checck"; }
  if(!empty($_POST["order1"])){ $order1 = $_POST["order1"]; } else { $order1 = 1; }
  if(!empty($_POST["group"])){ $group = $_POST["group"]; } else { $group = "No_checek"; }

//	$order = $_POST["order"];
//	$order1 = $_POST["order1"]; 
//	$group = $_POST["group"];

   $flg = 0;
   if($order == "checked"){ $flg += 2; }
   if($group == "checked"){ $flg += 1; }
   

   //*******************************************************************
   $s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
   mysql_select_db("00rd001",$s);
   //*******************************************************************

   switch($flg){
      case "1":
         //**************************************************************************************
         $sql = "select c_name as 会社名,sum(c_yoshin) as 与信限度額 from customer group by c_name";
         //**************************************************************************************
	     break;
      case "2":
         //*******************************************************************************************
         $sql = "select c_name as 会社名,c_yoshin as 与信限度額 from customer order by c_yoshin $order1";
         //*******************************************************************************************
	     break;
      case "3":
         //*********************************************************************************************************************
         $sql = "select c_name as 会社名,sum(c_yoshin) as 与信限度額 from customer group by c_name order by sum(c_yoshin) $order1";
         //*********************************************************************************************************************
	     break;
      default:
         //*****************************************************************
         $sql = "select c_name as 会社名,c_yoshin as 与信限度額 from customer";
         //*****************************************************************
	     break;
   }
   //*******************************************************************
   $res = mysql_query($sql,$s);
   //*******************************************************************

   //結果を表示ここから=====================================================
   print "<table border='1'>";
   print "<tr>";
   for($i=0;$i<mysql_num_fields($res);$i++){
      print("<td>".mysql_field_name($res,$i)."</td>");
   }
   print "</tr>";
	
   while($row = mysql_fetch_array($res)){
      print "<tr>";
      for($i=0;$i<mysql_num_fields($res);$i++){
         print("<td>".$row[$i]."</td>");
      }
      print "</tr>";
   }
   print "</table>";
   print "<br><br>";
   //ここまで====================================================



   //最後にパラメタを文字列に変換する
   if($order == "checked"){
      if($order1 == "asc"){
	     $order1 = "昇順(ASC)";
	  }
	  if($order1 == "desc"){
	     $order1 = "降順(DESC)";
	  }
   }else{
      $order1 = "";
   }
   print "--------------------------条件--------------------------<br>";
   print "ORDER BY=$order<br>";
   print "昇降=$order1<br>";
   print "GROUP=$group<br>";
   
   print "<form method='post' action='jyoken02.php'>";
   print "<input type='submit' name='back' value='条件指定画面に戻る'>";
   print "</form>";
?>
</body>
</html>
