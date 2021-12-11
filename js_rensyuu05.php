<html>
<head>
<meta charset="UTF-8">
</head>
	<body>
		<?php
		$conn=mysqli_connect("127.0.0.1","root","mysqlpass","19rd142") or die("失敗です");
		$query="SELECT*FROM goods";
		$result=mysqli_query($conn, $query);
			print("<select id ='data_value'>");

			while($row = mysqli_fetch_array($result)){
				print("<option value = $row[2]>");
				print("$row[1]");
				print("</option>");
			}
			print("</select> ");
			print("値段");
			print("<span id='value_total'></span>");
			print("円");
		mysqli_close($conn);
		?>
	<script type="text/javascript">
	document.getElementById("data_value").addEventListener("change",function(){
	document.getElementById("value_total").innerHTML = document.getElementById("data_value").value;
	}, false);
	</script>
	</body>
</html>