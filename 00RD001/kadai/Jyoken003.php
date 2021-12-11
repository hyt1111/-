<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head><title>*** Jyoken003 ***</title></head>
<body>
<h1>フィールドの追加・修正・削除</h1>
<form method="post" action="Jyoken003_2.php">
<table border="1">
    <tr><td>操作</td> <td><input type='radio' name='sousa' value="tuika">追加　<input type='radio' name='sousa' value="syusei">修正　<input type='radio' name='sousa' value="sakujo">削除</td></tr>
    <tr><td>フィールド名</td> <td><input type='text' name='field_name'></td></tr>
    <tr><td>型名</td> <td><select name='type_name'>
        <option value='int'>INT</option>
        <option value='varchar'>VARCHAR</option>
        <option value='text'>TEXT</option>
        <option value='date'>DATE</option></select>
    </td></tr>
    <tr><td>型サイズ</td><td><input type='text' name='type_size'></td></tr>
    <tr><td>初期値</td><td><input type='text' name='init'></td></tr>
    <tr><td>オプション</td><td><input type='radio' name='option' value='none' >なし</td></tr>
    <tr><td></td><td><input type='radio' name='option' value='unsigned' >UNSIGNED</td></tr>
    <tr><td></td><td><input type='radio' name='option' value='zerofill' >ZEROFILL</td></tr>
    <?php
    $conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");
    $res=mysqli_query($conn,"SELECT * FROM customer");
    echo "<tr><td>現フィールド名</td><td><select name='field'>";
    echo "<option value=''  style='display:none;'></option>";
    for($i=0;$i<mysqli_num_fields($res);$i++){
        $table_name=mysqli_fetch_field_direct($res,$i);
        print("<option value='".$table_name->name."'>".$table_name->name."</option>");
    }
    echo "</select></td></tr>";
    mysqli_close($conn);
    ?>
    </table>
<input type='submit' name='submit' value='変更'><br>
</form>
