<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>条件指定検索プログラム２</title>
</head>
<body>
<?php
   print "<h1>条件指定検索プログラム２</h1>";
   print "<h3>並び替えて検索</h3>";
   print "<form method='post' action='jyoken02_syori.php'>";
   print "<table border='1'>";

   $comm1 = array();
      array_push($comm1,"<input type='checkbox' name='order' value='checked'>ORDER BYによる並び替え");
      array_push($comm1,"");
      array_push($comm1,"<input type='checkbox' name='group' value='checked'>GROUP BYによる並び替え");

   $comm2 = array();
      array_push($comm2,"<input type='radio' name='order1' value='asc' checked>昇順");
      array_push($comm2,"<input type='radio' name='order1' value='desc'>降順");
      array_push($comm2,"");

   for($i=0;$i<3;$i++){
      print "<tr>";
      print "<td>$comm1[$i]</td>";
      print "<td>$comm2[$i]</td>";
      print "</tr>";
   }
   print "</table>";
   
   print "<br><br>";
   print "<input type='submit' value='検索' style='width:500px'>";
   print "</form>";
?>
</body>
</html>
