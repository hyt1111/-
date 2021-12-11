<html><meta http-equiv="content-type" content="text/html; charset=utf-8">
<head><title>***kantan001***</title></head>
<body>
    <?php
    $conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");

    $res=mysqli_query($conn,"SELECT * FROM customer");
    $res2=mysqli_query($conn,"SELECT * FROM goods");
    
    echo "<form method='POST' action=''>";
    echo "商店名　<select name='C_Name' style='width:130px;'>";
    echo "<option value=''  style='display:none;'>選択してください</option>";
    while($row=mysqli_fetch_array($res)){
        if($row["C_Name"]==$_POST["C_Name"]){
            print("<option value='".$row["C_Name"]."' selected>".$row["C_Name"]."</option>");
        }else{
            print("<option value='".$row["C_Name"]."'>".$row["C_Name"]."</option>");
        }
        
    }
    echo "</select><br>";
    
    echo"商品名　<select name='G_Name' style='width:130px;'>";
    echo"<option value='' style='display:none;'>選択してください</option>";
    while($row=mysqli_fetch_array($res2)){
        if($row["G_Name"]==$_POST["G_Name"]){
            print("<option value='".$row["G_Name"]."' selected>".$row["G_Name"]."</option>");
        }else{
            print("<option value='".$row["G_Name"]."'>".$row["G_Name"]."</option>");
        }
    }
    echo "</select><br>";
    ?>
    個数　　<INPUT TYPE='text' NAME='kosuu' style='width:130px;'  value="<?php if( !empty($_POST['kosuu']) ){ echo $_POST['kosuu']; } ?>"><br>
    <input type='submit' name='kakunin' value='確認'><br><br>
    </form>

    <form method='POST' action='kantan001_2.php'>
    <?php
    if(isset($_POST['kakunin'])){
        $C_Name=$_POST["C_Name"];
        $G_Name=$_POST["G_Name"];
        $kosuu=$_POST["kosuu"];
        $res2=mysqli_query($conn,"SELECT * FROM goods WHERE G_Name='$G_Name'");
        $row=mysqli_fetch_array($res2);
        print("単価　　<input type='text' disabled name='tanka' value='".$row["G_Price"]."'><br>");
        print("合計金額<input type='text' disabled value='".$row["G_Price"]*$kosuu."'><br>");
        //disabledの値は送れない
        print("<input type='hidden'  name='total' value='".$row["G_Price"]*$kosuu."'>");
        print("<input type='hidden' name='C_Name' value='$C_Name'>");
        print("<input type='hidden' name='G_Name' value='$G_Name'>");
        print("<input type='hidden' name='kosuu' value='$kosuu'>");
        if($row["G_Price"] and $kosuu and $C_Name!=''){
            print("<input type='submit' value='送信'>");
        }else{
            print("<input type='submit' disabled value='送信'>");
        }

    }else{
        print("単価　　<input type='text' disabled name='tanka'><br>");
        print("合計金額<input type='text' disabled name='total'><br>");
        print("<input type='submit' disabled value='送信'>");
    }
    mysqli_close($conn);
    ?>
    </form>
</body>
</html>
