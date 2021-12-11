<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>*** Kadai01 ***</title>
</head>
<body>
<?php
	$conn= mysqli_connect("127.0.0.1", "root", "mysqlpass", "19rd142") or die("失敗です");
?>
<form method ='post'  action  =  'Kantan_uke.php'>

	<table border ='0'>
		<?php
			$c_name = mysqli_query($conn, "SELECT * FROM customer");
		?>
		<tr>
			<th align ='left' width = '100'>商店名</th>
			<td width  = '100'>
			<select name = 'c_name' id = 'c_name'style ='width:100px;'>
				<?php
					print("<option value = ---->");
					print("------");
					print("</option>");
					while($row = mysqli_fetch_array($c_name)){
						print("<option value = $row[1]>");
						print("$row[1]");
						print("</option>");
					}
				?>
			</select>
			</td>
		</tr>
		<?php
			$g_name = mysqli_query($conn, "SELECT * FROM goods");
		?>
		<tr>
			<th align ='left' width = '100'>商品名</th>
			<td width  = '100'>
			<select name='g_name' id = 'g_name'style ='width:100px;'>
			<?php
				print("<option value = ---->");
				print("------");
				print("</option>");
				while($row = mysqli_fetch_array($g_name)){
					print("<option value = $row[2]>");
					print("$row[1]");
					print("</option>");
				}
			?>
			</select>
			</td>
		</tr>
		<tr>
			<th align ='left' width = '100'>個数</th>
			<td width  = '100'>
			<select name = 'g_value' id = 'g_value'style ='width:100px;'>
			<?php
				print("<option value = ---->");
				print("------");
				print("</option>");
				$i = 1;
				while($i < 101){
					print("<option value = $i>");
					print("$i");
					print("</option>");
					$i++;
				}
			?>
			</select>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
			<td>
			<input type = 'button' value = '確認' onclick = 'judfun()'>
			</td>
			</td>
		</tr>
		<tr>
			<th align ='left' width = '100'>単価</th>
			<td width  = '100'>
				<input type='text' name = 'tanka' id='tanka' style ='width:100px;' readonly='readonly'>
			</td>
		</tr>
		<tr>
			<th align ='left' width = '100'>合計金額</th>
			<td width  = '100'>
				<input type='text' name='goukei' id='goukei' style ='width:100px;' readonly='readonly'>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<td>
					<input type = 'submit' value = '実効' >
				</td>
			</td>
		</tr>
	</table>
</form>


<script type="text/javascript">
	function judfun(){
		var idx=document.getElementById("g_name").selectedIndex;
		document.getElementById("tanka").value=g_name.value;
		document.getElementById("goukei").value=g_value.value*g_name.value;
}
</script>	
</form>
<?php
	mysqli_close($conn);
?>
</body>
</html>