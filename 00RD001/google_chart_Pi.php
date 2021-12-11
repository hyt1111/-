<?php
	// DB名を各自のDB名に変更する必要あり（00rdxxx→学籍番号）
	$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "00rd001");
	// テーブル名を指定
	$Table_name = "customer";
	// クエリを実行
	$res = mysqli_query($conn,"SELECT C_Name, C_Yoshin FROM $Table_name");

	/******************* 【テーブルのデータを配列に格納】 *******************/
	for($i = 0; $i < mysqli_num_fields($res); $i++){
		// テーブルの列名を配列に格納
		$Column_name = mysqli_fetch_field_direct($res, $i);
		$name_array[$i] = $Column_name->name;
	}

	$i = 0;
	while($row = mysqli_fetch_array($res)){
		for($j = 0; $j < mysqli_num_fields($res); $j++){
			// データを格納
			$data_array[$i][$j] = $row[$j];
		}
		$i++;
	}
	/************************************************************************/
?>
<html lang = "ja">
	<head>
		<!-- 文字コード設定  -->
		<meta charset = "UTF-8"/>
		<title>データベース論 Google Chart Sample</title>

		<!-- ライブラリを読み込む -->
		<script type = "text/javascript" src = "https://www.google.com/jsapi"></script>

		<script type = "text/javascript">
			google.load("visualization", "1", { packages: ["corechart"] });
			google.setOnLoadCallback(drawChartSamplePie);

			function drawChartSamplePie() {
				/* ___________________________________________ 【データ挿入部分】 _____________________________________________

			       １行目  ：テーブルの列名を格納                     （['講義', '出席人数'],）
			       ２行目～：列に関連するデータを格納                 （['第1回目', 57],     ）
			       最終行  ：列に関連するデータを格納＋カンマを未入力 （['第8回目', 63]      ）
			       ※文字の場合は「''」で囲むこと。

			       ●データ（列）を追加する場合は、上記の「'出席人数'」の右にカンマ(,)を入れ、列名とそのデータを追加する。
			         (例)１行目：['講義', '出席人数'],   →   ['講義', '出席人数', '欠席人数'],
			             ２行目：['第1回目', 57],        →   ['第1回目', 57, 43],
			       ____________________________________________________________________________________________________________ */

				var data = google.visualization.arrayToDataTable([
					<?php
						/************************************************************/
						/* このプログラムはデータベースから取得したデータを自動的に */
						/* 上記の【データ挿入部分】の形式に変換して出力する。       */
						/************************************************************/


						/********************* 【データ挿入部分】１行目にテーブルの列名を出力 *********************/
						for($i = 0; $i < count($name_array); $i++){
							// 1列目の場合
							if($i == 0) {
								print("['".$name_array[$i]."',");
							}
							// 最終列の場合
							else if($i == count($name_array) - 1) {
								print("'".$name_array[$i]."'],");
							}
							// 2列目～最終列の1つ前の行までの場合
							else {
								print("'".$name_array[$i]."',");
							}
						}
						/********************* 【データ挿入部分】２行目からはデータの値を出力 *********************/
						for($i = 0; $i < count($data_array); $i++){
							// 最終行はカンマを未入力にする。（カンマがあるとグラフが表示されない）
							if($i == count($data_array) - 1) {
								for($j = 0; $j < count($data_array[$i]); $j++) {
									// 1列目の場合
									if($j == 0) {
										print("['".$data_array[$i][$j]."',");
									}
									// 最終列の場合
									else if($j == count($data_array[$i]) - 1) {
										print($data_array[$i][$j]."]");
									}
									// 2列目～最終列の1つ前の行までの場合
									else {
										print($data_array[$i][$j].",");
									}
								}
							}
							else {
								for($j = 0; $j < count($data_array[$i]); $j++) {
									// 1列目の場合
									if($j == 0) {
										print("['".$data_array[$i][$j]."',");
									}
									// 最終列の場合
									else if($j == count($data_array[$i]) - 1) {
										print($data_array[$i][$j]."],");
									}
									// 2列目～最終列の1つ前の行までの場合
									else {
										print($data_array[$i][$j].",");
									}
								}
							}
						}
					?>
				]);


				/* ___________________________________ 【グラフのオプションを追加する部分】 ___________________________________

				   オプションを複数個追加する場合は、各オプションの最後にカンマ(,)を入力する。
				     （最後のオプションにはカンマを入力しない）

				   例：width: 1000,
				       height: 300,
				       title: 'Google Chart Sample'

				   ○オプションの主な機能
				     グラフのタイトル                            → title（例： title: 'Google Chart Sample'）
				     グラフの横幅                                → width（例： width: 1000）
				     グラフの縦幅                                → height（例： height: 300）
				     枠線を消す                                  → gridlines: {color: 'none'}
				     指標線を消す（折れ線グラフや棒グラフに使用）→ baselineColor: 'none'
				     横軸タイトル（折れ線グラフや棒グラフに使用）→ hAxis: {title: '講義'}
				     縦軸タイトル（折れ線グラフや棒グラフに使用）→ vAxis: {title: '人数'}
				   ____________________________________________________________________________________________________________
				*/
				var options = {
					title: 'Google Chart Sample',
					width: 1000,
					height: 300,
					hAxis: {title: '店名'},
					vAxis: {title: '金額'}
				};


				/* _____________________________________ 【グラフの種類を変更する部分】 _______________________________________

				   グラフの種類を変更するには、下記の「AreaChart」を変更すると実現可能である。

				   主なグラフの種類：「PieChart」   ＝ 円グラフ
				                     「LineChart」  ＝ 折れ線グラフ
			                         「AreaChart」  ＝ 面積グラフ（折れ線グラフの折れ線の下部に色がつく）
			                         「ColumnChart」＝ 棒グラフ
			                         「BarChart」   ＝ 棒グラフ（横バージョン）
				   ____________________________________________________________________________________________________________
				*/
			// 「ColumnChart」＝ 棒グラフ
				var chart1 = new google.visualization.ColumnChart(document.getElementById('chart_sample1'));
			// 「PieChart」   ＝ 円グラフ
				var chart2 = new google.visualization.PieChart(document.getElementById('chart_sample2'));
			// 「LineChart」  ＝ 折れ線グラフ
				var chart3 = new google.visualization.LineChart(document.getElementById('chart_sample3'));
			// 「BarChart」   ＝ 棒グラフ（横バージョン）
				var chart4 = new google.visualization.BarChart(document.getElementById('chart_sample4'));
			// 「AreaChart」  ＝ 面積グラフ（折れ線グラフの折れ線の下部に色がつく）
				var chart5 = new google.visualization.AreaChart(document.getElementById('chart_sample5'));



				// グラフの描写
				chart1.draw(data, options);
				chart2.draw(data, options);
				chart3.draw(data, options);
				chart4.draw(data, options);
				chart5.draw(data, options);
			}
		</script>
	</head>

	<body>
		<!-- ページにグラフを表示する -->
		<div id = 'chart_sample1'></div>
		<br><br>
		<div id = 'chart_sample2'></div>
		<br><br>
		<div id = 'chart_sample3'></div>
		<br><br>
		<div id = 'chart_sample4'></div>
		<br><br>
		<div id = 'chart_sample5'></div>
		<br><br>
	</body>
</html>