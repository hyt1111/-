<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>テープル操作プログラム</title>
</head>
<body>
<?php
   //*******************************************************************
   $s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
   mysql_select_db("00rd000",$s);
   //*******************************************************************
   print "<h1>テーブル操作プログラム</h1>";
   print "<h3>フィールド（項目）の追加・修正・削除</h3>";
   print "<form method='post' action='jyoken03_syori.php'>";
   print "<table border='1'>";
   
   //メインテーブル１
   $comm1 = array();
      array_push($comm1,"操作");
      array_push($comm1,"フィールド名");
      array_push($comm1,"型名");
	  array_push($comm1,"型サイズ");
	  array_push($comm1,"初期値");
	  array_push($comm1,"オプション");
	  array_push($comm1,"");
	  array_push($comm1,"");
	  array_push($comm1,"現フィールド名");
   //操作
   $_operate = array();
      array_push($_operate,"<input type='radio' name='field_operate' value='invalid' checked>無効");
	  array_push($_operate,"<input type='radio' name='field_operate' value='add'>追加");
	  array_push($_operate,"<input type='radio' name='field_operate' value='revise'>修正");
	  array_push($_operate,"<input type='radio' name='field_operate' value='delete'>削除");
	  $operate = "";
	  for($i=0;$i<4;$i++){
	     $operate = $operate.$_operate[$i];
	  }
   //型名（整数型）
   $_integer = array();
      array_push($_integer,"<optgroup label='整数型'>");
      array_push($_integer,"<option value='tinyint'>TinyInt</option>");
	  array_push($_integer,"<option value='smallint'>SmallInt</option>");
	  array_push($_integer,"<option value='mediumint'>MediumInt</option>");
	  array_push($_integer,"<option value='int'>Int</option>");
	  array_push($_integer,"<option value='bigint'>BigInt</option>");
	  array_push($_integer,"</optgroup>");
	  $integer = "";
	  for($i=0;$i<7;$i++){
	     $integer = $integer.$_integer[$i];
	  }
   //型名（浮動小数点型）
   $_float = array();
      array_push($_float,"<optgroup label='浮動小数点型'>");
      array_push($_float,"<option value='float'>Float</option>");
	  array_push($_float,"<option value='double'>Double</option>");
	  array_push($_float,"</optgroup>");
	  $float = "";
	  for($i=0;$i<4;$i++){
	     $float = $float.$_float[$i];
	  }
   //型名（文字列型）
   $_string = array();
      array_push($_string,"<optgroup label='文字列型'>");
      array_push($_string,"<option value='char'>Char</option>");
	  array_push($_string,"<option value='varchar'>VarChar</option>");
	  array_push($_string,"</optgroup>");
	  $string = "";
	  for($i=0;$i<4;$i++){
	     $string = $string.$_string[$i];
	  }
   //型名（メイン）
   $_model = array();
      array_push($_model,"<select name='field_model'>");
      array_push($_model,$integer);
      array_push($_model,$float);
      array_push($_model,$string);
	  array_push($_model,"</select>");
	  $model = "";
      for($i=0;$i<5;$i++){
	     $model = $model.$_model[$i];
	  }
   //オプション
   $_option = array();
      array_push($_option,"<input type='radio' name='field_option' value='none' checked>なし");
      array_push($_option,"<input type='radio' name='field_option' value='unsigned'>UNSIGNED");
      array_push($_option,"<input type='radio' name='field_option' value='zerofill'>ZEROFILL");
      $option0 = $_option[0];
      $option1 = $_option[1];
      $option2 = $_option[2];

   //現フィールド名	  
   //**************************
   $sql = "select * from customer";
   $res = mysql_query($sql,$s);
   //**************************
   $col = array();
   for($i=0;$i<mysql_num_fields($res);$i++){
      $buf = mysql_field_name($res,$i);
      array_push($col,$buf);
   }

   $_current = array();
      array_push($_current,"<select name='current_field_name'>");
	  for($i=0;$i<count($col);$i++){
	     array_push($_current,"<option>".$col[$i]."</option>");
	  }
	  array_push($_current,"</select>");
   
      $current = "";
      for($i=0;$i<count($col)+2;$i++){
	     $current = $current.$_current[$i];
	  }
   
   $comm2 = array();
      array_push($comm2,$operate);
      array_push($comm2,"<input type='text' name='field_name'>");
      array_push($comm2,$model);
      array_push($comm2,"<input type='text' name='field_size'>");
      array_push($comm2,"<input type='text' name='field_default'>");
	  array_push($comm2,$option0);
	  array_push($comm2,$option1);
	  array_push($comm2,$option2);
      array_push($comm2,$current);

   for($i=0;$i<9;$i++){
      print "<tr>";
      print "<td>$comm1[$i]</td>";
      print "<td>$comm2[$i]</td>";
      print "</tr>";
   }
   print "</table>";
   
   
   print "<h3>レコードの追加・修正・削除</h3>";
   print "<table border='1'>";
   $comm1 = array();
      array_push($comm1,"操作");

   $_operate = array();
      array_push($_operate,"<input type='radio' name='record_operate' value='invalid' checked>無効");
	  array_push($_operate,"<input type='radio' name='record_operate' value='add'>追加");
	  array_push($_operate,"<input type='radio' name='record_operate' value='revise'>修正");
	  array_push($_operate,"<input type='radio' name='record_operate' value='delete'>削除");
	  $operate = "";
	  for($i=0;$i<4;$i++){
	     $operate = $operate.$_operate[$i];
	  }

   $comm2 = array();
      array_push($comm2,$operate);
   
   for($i=0;$i<1;$i++){
      print "<tr>";
      print "<td>$comm1[$i]</td>";
      print "<td>$comm2[$i]</td>";
      print "</tr>";
   }
   print "</table>";
   
   print "<br><br>";
   print "<input type='submit' value='処理実行' style='width:500px'>";
   print "</form>";
?>
</body>
</html>
