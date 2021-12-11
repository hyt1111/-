<?php
$m=array("眠くないですか","おはようございます","こんにちは","こんばんは");
print date("G"); print "<BR>";
      $Now_Japan=date("G")+7;
print $Now_Japan; print "<BR>";

	if ($Now_Japan>=18){
	print $m[3];
	}elseif($Now_Japan>=9){
	print $m[2];
	}elseif($Now_Japan>=6){
	print $m[1];
	}else{
	print $m[0]; }
	
?>
