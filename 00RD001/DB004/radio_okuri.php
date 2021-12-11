<FORM ACTION="radio_uke.php" METHOD="post">
あなたの年齢を選択して、送信ボタンをクリックしてください。<BR>
<?php
$i=1; $c=1;
while($i<=100){
print "<INPUT TYPE='radio' NAME='r' VALUE='$i'>$i";
if($c==10){ print "<BR>"; $c=0;}
$i++;
$c++;
}
?>
<INPUT TYPE="submit" VALUE="送信">
</FORM>