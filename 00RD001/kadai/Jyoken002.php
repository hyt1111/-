<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head><title>*** Jyoken002 ***</title></head>
<body>
<h1>条件指定検索プログラム2</h1>
<h2>条件指定による検索</h2>
<form method="post" action="Jyoken002.php">
<table border="1">
    <tr><td>倍数</td> <td><input type='number' name='baisuu' value="<?php if( !empty($_POST['baisuu']) ){ echo $_POST['baisuu']; } ?>"></td></tr>
    <tr><td>LIMIT</td> <td><input type='number' name='limit' value="<?php if( !empty($_POST['limit']) ){ echo $_POST['limit']; } ?>"></td></tr>
    <tr><td>OFFSET</td> <td><input type='number' name='offset' value="<?php if( !empty($_POST['offset']) ){ echo $_POST['offset']; } ?>"></td></tr>
    <tr><td>範囲指定</td> <td><input type='radio' name='jyoken' value='none' <?php if(!isset($_POST['jyoken'] )||$_POST['jyoken']=='none'){ echo "checked"; } ?> >なし</td></tr>
    <tr><td></td><td><input type='radio' name='jyoken' value='morethan' <?php if(isset($_POST['jyoken'] )&&$_POST['jyoken']=='morethan'){ echo "checked"; } ?> > <input type="number" name="morethan1" min="0" max="100000000" value="<?php if( !empty($_POST['morethan1']) ){ echo $_POST['morethan1']; } ?>">超</td></tr>
    <tr><td></td><td><input type='radio' name='jyoken' value='lessthan' <?php if(isset($_POST['jyoken'] )&&$_POST['jyoken']=='lessthan'){ echo "checked"; } ?> > <input type="number" name="lessthan1" min="0" max="100000000" value="<?php if( !empty($_POST['lessthan1']) ){ echo $_POST['lessthan1']; } ?>">未満</td></tr>
    <tr><td></td><td><input type='radio' name='jyoken' value='morethan_lessthan'  <?php if(isset($_POST['jyoken'] )&&$_POST['jyoken']=='morethan_lessthan'){ echo "checked"; } ?> > <input type="number" name="morethan_lessthan1" min="0" max="100000000" <?php if( !empty($_POST['morethan_lessthan1']) ){ echo "value=".$_POST['morethan_lessthan1']; } ?> >超<input type="number" name="morethan_lessthan2" min="0" max="100000000" <?php if( !empty($_POST['morethan_lessthan2']) ){ echo "value=".$_POST['morethan_lessthan2']; } ?>>未満</td></tr>
    <tr><td></td><td><input type='radio' name='jyoken' value='ijou'  <?php if(isset($_POST['jyoken'] )&&$_POST['jyoken']=='ijou'){ echo "checked"; } ?> > <input type="number" name="ijou1" min="0" max="100000000" value="<?php if( !empty($_POST['ijou1']) ){ echo $_POST['ijou1']; } ?>">以上</td></tr>
    <tr><td></td><td><input type='radio' name='jyoken' value='ika'  <?php if(isset($_POST['jyoken'] )&&$_POST['jyoken']=='ika'){ echo "checked"; } ?> > <input type="number" name="ika1" min="0" max="100000000" value="<?php if( !empty($_POST['ika1']) ){ echo $_POST['ika1']; } ?>">以下</td></tr>
    <tr><td></td><td><input type='radio' name='jyoken' value='ijou_ika'  <?php if(isset($_POST['jyoken'] )&&$_POST['jyoken']=='ijou_ika'){ echo "checked"; } ?> > <input type="number" name="ijou_ika1" min="0" max="100000000" value="<?php if( !empty($_POST['ijou_ika1']) ){ echo $_POST['ijou_ika1']; } ?>">以上<input type="number" name="ijou_ika2" min="0" max="100000000" value="<?php if( !empty($_POST['ijou_ika2']) ){ echo $_POST['ijou_ika2']; } ?>">以下</td></tr>
    <tr><td>順序指定</td><td><select name='order' style='width:100px;'>
    <option value='NONE' <?php if(isset($_POST['order']) && $_POST['order']=='NONE'){ echo "selected"; } ?>>なし</option>
    <option value='ASC' <?php if(isset($_POST['order']) && $_POST['order']=='ASC'){ echo "selected"; } ?>>昇順</option>
    <option value='DESC' <?php if(isset($_POST['order']) && $_POST['order']=='DESC'){ echo "selected"; } ?>>降順</option>
    </select></td></tr>
</table>

<h2>追加検索</h2>
<table border="1">
<tr><td><input type="checkbox" name="avg" value="AVG" <?php if(isset($_POST['avg']) ){ echo "checked"; } ?> ></td><td>平均値(AVG)</td></tr>
<tr><td><input type="checkbox" name="cnt" value="COUNT" <?php if(isset($_POST['cnt']) ){ echo "checked"; } ?> ></td><td>データ個数(COUNT)</td></tr>
<tr><td><input type="checkbox" name="group" value="GROUP BY" <?php if(isset($_POST['group']) ){ echo "checked"; } ?> ></td><td>会社別(GROUP BY)</td></tr>
</table>
<input type='submit' name='submit' value='表示'><br>
</form>
<?php
if(isset($_POST['submit'])){
    $conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");
    $sql="SELECT C_Name as 会社名, C_Yoshin ";

    if(!empty($_POST['baisuu']))
        $sql.="* ".$_POST['baisuu'];
    $sql.=" as 与信限度額 FROM ";

    if(isset($_POST['group']))
        $sql.=" ( SELECT C_Name, SUM(C_Yoshin) as C_Yoshin FROM customer GROUP BY C_Name ";
    elseif($_POST['limit'])
        $sql.=" ( SELECT * FROM customer ";
    else
        $sql.=" customer ";

    if(isset($_POST['jyoken'])&&$_POST['jyoken']!='none'){
            $sql=Jyoken($sql);
    }

    if(isset($_POST['order'])&&$_POST['order']!='NONE'){
        if(isset($_POST['group']))
            $sql.=" ORDER BY SUM(C_Yoshin) ";
        else
            $sql.=" ORDER BY C_Yoshin";
        if($_POST['order']=='DESC')
            $sql.=" DESC";
    }

    if($_POST['limit']){
        $sql.=" LIMIT ".$_POST['limit'];
        if($_POST['offset']){
            $sql.=" OFFSET ".$_POST['offset'];
        }
    }
    if($_POST['limit']||isset($_POST['group']))
        $sql.=' ) as c ';

    print($sql."<br>");
    $res=mysqli_query($conn,$sql);
    print("<table border='1'>");
    print("<tr>");
    for($i=0;$i<mysqli_num_fields($res);$i++){
        $table_name=mysqli_fetch_field_direct($res,$i);
        print("<td>".$table_name->name."</td>");
    }
    print("</tr>");
    while($row=mysqli_fetch_array($res)){
        print("<tr>");
        for($i=0;$i<mysqli_num_fields($res);$i++){
            print("<td>".$row[$i]."</td>");
        }
        print("</tr>");
    }

    if(isset($_POST['avg'])){
        $sql="";
        $sql="SELECT ".addjyoken($sql,$_POST['avg']);
        print($sql."<br>");
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        print("<tr><td>".mysqli_fetch_field_direct($res,0)->name."</td><td>".(int)$row[0]."</td></tr>");
    }

    if(isset($_POST['cnt'])){
        $sql="";
        $sql="SELECT ".addjyoken($sql,$_POST['cnt']);
        print($sql."<br>");
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        print("<tr><td>".mysqli_fetch_field_direct($res,0)->name."</td><td>".$row[0]."</td></tr>");
    }
    print("</table>");

    mysqli_close($conn);
}
?>
</body>
</html>

<?php
function Jyoken($sql)
{
    if(isset($_POST['group']))
        $sql.=" HAVING SUM(C_Yoshin) ";
    else
        $sql.=" WHERE C_Yoshin ";
    switch($_POST['jyoken']){
            case "none":
                break;
            case "morethan":
                if(!empty($_POST['morethan1']))
                    $sql.=" >".$_POST['morethan1'];
                break;
            case "lessthan":
                if(!empty($_POST['lessthan1']))
                    $sql.=" <".$_POST['lessthan1'];
                break;
            case "morethan_lessthan":
                if(!empty($_POST['morethan_lessthan1'])&&!empty($_POST['morethan_lessthan2'])&&$_POST['morethan_lessthan2']>$_POST['morethan_lessthan1']){
                    $more=$_POST['morethan_lessthan1']+1;
                    $less=$_POST['morethan_lessthan2']-1;
                    $sql.=" BETWEEN ".$more." AND ".$less;
                }
                break;
            case "ijou":
                if(!empty($_POST['ijou1']))
                    $sql.=" >=".$_POST['ijou1'];
                break; 
            case "ika":
                if(!empty($_POST['ika1']))
                    $sql.=" <=".$_POST['ika1'];
                break; 
            case "ijou_ika":
                if(!empty($_POST['ijou_ika1'])&&!empty($_POST['ijou_ika2'])&&$_POST['ijou_ika2']>$_POST['ijou_ika1'])
                    $sql.=" BETWEEN ".$_POST['ijou_ika1']." AND ".$_POST['ijou_ika2'];
                break;  
            default:
                break;
        }
    return $sql;
}
function addjyoken($sql,$jyoken){
    if($jyoken=="AVG"){
        $sql.=$jyoken."(C_Yoshin";
        if(!empty($_POST['baisuu']))
            $sql.=" * ".$_POST['baisuu'];
        $sql.=" ) as 平均 FROM ";
    }else if($jyoken=="COUNT"){
        $sql.=$jyoken."( * ) as 個数 FROM ";
    }

    if(isset($_POST['group']))
        $sql.=" ( SELECT SUM(C_Yoshin) as C_Yoshin FROM customer GROUP BY C_Name ";
    elseif($_POST['limit'])
        $sql.=" ( SELECT * FROM customer ";
    else
        $sql.=" customer ";

    if(isset($_POST['jyoken'])&&$_POST['jyoken']!='none'){
            $sql=Jyoken($sql);
    }

    if(isset($_POST['order'])&&$_POST['order']!='NONE'){
        if(isset($_POST['group']))
            $sql.=" ORDER BY SUM(C_Yoshin) ";
        else
            $sql.=" ORDER BY C_Yoshin";
        if($_POST['order']=='DESC')
            $sql.=" DESC";
    }
    
    if($_POST['limit']){
        $sql.=" LIMIT ".$_POST['limit'];
        if($_POST['offset']){
            $sql.=" OFFSET ".$_POST['offset'];
        }
    }
    if($_POST['limit']||isset($_POST['group']))
        $sql.=' ) as c ';
    return $sql;
}
?>