<html><meta http-equiv="content-type" content="text/html; charset=utf-8">
<head><title>*** 4-3 ***</title></head><body>
<table border="1">
<?php
$count=1;
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","19rd142");
    $re = mysqli_query($conn,"SELECT ID,Name as 名前 FROM student");
    for( $i = 0; $i < mysqli_num_fields($re); $i++){
        $table_name = mysqli_fetch_field_direct($re, $i);
        $count++;
        print("<td>".$table_name->name."</td>");
    }
    print("</tr>");
    while($row = mysqli_fetch_array($re)){
        print("<tr>");
    for( $i = 0; $i < mysqli_num_fields($re); $i++ ){
        print("<td>".$row[$i]."</td>");
    }
    print("</tr>");
    }
    ?>
</table><br>
  <FORM METHOD="post" ACTION="4-3-uke.php">
   <select NAME="a0" LIST="id"  value="">
    <option value="" disabled style="display:none;" <?php if(empty($_POST['a0'])) echo 'selected'; ?>>選択してください</option>
    <option value="1"　<?php echo array_key_exists('a0', $_POST) && $_POST['a0'] == "1" ? 'selected' : ''; ?>>1</option>
    <option value="2" <?php echo array_key_exists('a0', $_POST) && $_POST['a0'] == "2" ? 'selected' : ''; ?>>2</option>
    <option value="3"  <?php echo array_key_exists('a0', $_POST) && $_POST['a0'] == "3" ? 'selected' : ''; ?>>3</option>
    <option value="4" <?php echo array_key_exists('a0', $_POST) && $_POST['a0'] == "4" ? 'selected' : ''; ?>>4</option>
    </select>
    <INPUT TYPE="text" NAME="a1" SIZE = '15' value="<?php if(!empty($_POST['a1'])){ echo $_POST['a1']; } ?>">
    <INPUT TYPE="submit" VALUE="変更">
    <INPUT TYPE="hidden" NAME="h" VALUE="ins"></FORM><BR>
 
</body></html>
