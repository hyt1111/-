<html>
<head>
<meta charset="UTF-8">
</head>
	<body>
	<script type="text/javascript">
	let G_ID = [], G_Price = []; //"変数を宣言"//
	</script>
		<?php
			$conn=mysqli_connect("127.0.0.1","root","mysqlpass","19rd142") or die("失敗です");
			$query = "SELECT * FROM goods";
			$result = mysqli_query($conn, $query);
			print("<form method = ‘post’ action ='js_uke01.php'>"); //"PHPの中にHtmlを組み込む "//
			print("<select id = 'data_value'>");

			$i = 0;
			while($row = mysqli_fetch_array($result)){
				print("<option value = $row[0]>");
				print("$row[1]");
				print("</option>");
				print("<script>");
				print("G_ID[$i]=$row[0];"); //"ＰHP内にJavaScriptの変数を宣言 "//
				print("G_Price[$i]=$row[2];"); //"ＰHP内にJavaScriptの変数を宣言"//
				print("</script>");
				$i++;
			}
			print("</select> ");
		?>
		<?php
		//"値段を動的に表示 "//
		print("値段");
		print("<span id = 'value_total'></span>");
		print("円から");
		print("<span id = 'new_value'></span>");
		print("円");
		print("<input type = 'hidden' id = 'new_value_okuri' name = 'ew_value_okuri'>");
		print("<input type = 'hidden' id = 'G_ID' name = 'G_ID'>");
		print("<input type = 'submit' value = '更新'>");
		print("</form>"); //"PHPの中にHtmlを組み込みの終わり "//
		?>

		<script type="text/javascript">
		document.getElementById("G_ID").value = 1;
		document.getElementById("data_value").addEventListener("change", function(){
			let i = 0;
			while(G_ID[i]){
				if(G_ID[i] == document.getElementById("data_value").value){
					document.getElementById("value_total").innerHTML = G_Price[i];
					document.getElementById("G_ID").value = G_ID[i];
					break;
				}
				i++;
			}
		}, false);
		let new_value = 150; //"新しい値段を定義 "//
		document.getElementById("new_value").innerHTML = new_value;
		document.getElementById("new_value_okuri").value = new_value;
		</script>
		<?php
		mysqli_close($conn);
		?>
	</body>
</html>