<?php
	$name=$_POST["a"];
	$age=$_POST["b"];
	print $name;
	echo "さん、こんにちわ。<br />";
	if($age >= 20)
		print "あなたは成人です。";
	else
		print "あなたは未成年です。";
?>