﻿<html>
	<body>
	<h2>条件分岐1(bunnki.php)</h2>
	<?php
		$sample = 7;
		if($sample >= 10) {
			print "変数sampleは10以上";
		}else if($sample >= 5) {
			print "変数sampleは5以上10未満";
		}else {
			print "変数sampoleは5未満";
		}
	?>
	<form name="selbox">
<p>好きなプロ野球リーグは？</p>
<select name="league" onchange="teamSet()">
<option value="">*リーグ選択</option>
<option value="">セ・リーグ</option>
<option value="">パ・リーグ</option>
</select>

<p>好きなチームは？</p>
<select name="team">
<option value="">*チーム選択</option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
<option value=""></option>
</select>
</form>


<script>

//セ・リーグのチームの配列
var s_league=new Array(
"","中日","ヤクルト","巨人","阪神","横浜","広島"
);

//パ・リーグのチームの配列
var p_league=new Array(
"","ロッテ","西武","オリックス","ソフトバンク","楽天","日本ハム"
);


function teamSet(){

  //オプションタグを連続して書き換える
  for ( i=1; i<7; i++ ){

    //選択したリーグによって分岐
    switch (document.selbox.league.selectedIndex){
      case 0: document.selbox.team.options[i].text="";break;
      case 1: document.selbox.team.options[i].text=s_league[i];break;
      case 2: document.selbox.team.options[i].text=p_league[i];break;
    }
  }

  //チーム名のセレクトボックスの選択番号を０にする
  document.selbox.team.selectedIndex=0;
}

</script>

	</body>
</html>	