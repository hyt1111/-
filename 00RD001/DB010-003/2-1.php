<html>
	<head>
		<title>文書のタイトル</title>
	</head>
	<body>
		<?php
			print"
			<table border=”1”>
				<tr>
					<th>商品番号</th><th>商品名</th><th>種別</th><th>単価</th>
				</tr>
			";
			for($i=0;$i<30;$i++){
				print "<tr>
							<td>204</td><td>キュウリ</td><td>野菜</td><td>20</td>
						</tr>";
			}
			print"
			</table>
			";
		
	?>
	</body>
</html>