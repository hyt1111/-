<?php
	$conn = mysqli_connect("127.0.0.1","root","mysqlpass", "19rd142") or die( "失敗です");
	print "接続0K! <BR>";
	$h_d = $_POST["h"];
	switch("$h_d"){
			case "sel":
				$re=mysqli_query($conn,"SELECT * FROM customer ORDER BY C_ID");
				while($kekka = mysqli_fetch_array($re)){
						print $kekka[0];
						print" : ";
						print $kekka[1];
						print" : ";			
						print $kekka[2];
						print" : ";			
						print $kekka[3];
						print"<BR>";
				}
				break;
			
			case "ins":
				$C_ID = $_POST["a0"];
				$C_Name = $_POST["a1"];
				$C_Address = $_POST["a2"];
				$C_Yoshin = $_POST["a3"];
				mysqli_query($conn,"INSERT INTO customer(C_ID,C_Name,C_Address,C_Yoshin)
				VALUES('$C_ID','$C_Name','$C_Address','$C_Yoshin')");
				$re = mysqli_query($conn,"SELECT * FROM customer ORDER BY C_ID");
				while($kekka = mysqli_fetch_array($re)){
						print $kekka[0];
						print" : ";
						print $kekka[1];
						print" : ";
						print $kekka[2];
						print" : ";	
						print $kekka[3];	
						print"<BR>";
				}
				break;

			case "del":
				$b1_d = $_POST["b1"];
				mysqli_query($conn,"DELETE FROM customer WHERE C_ID = $b1_d");
				$re = mysqli_query($conn,"SELECT * FROM customer ORDER BY C_ID");
				while($kekka = mysqli_fetch_array($re)){
						print $kekka[0];
						print" : ";
						print $kekka[1];
						print" : ";			
						print $kekka[2];
						print" : ";			
						print $kekka[3];
						print"<BR>";
				}
				break;

			case "ser":
				$c1_d = $_POST["c1"];
				$re = mysqli_query($conn,"SELECT * FROM customer WHERE C_ID LIKE '%$c1_d%'");
				while($kekka = mysqli_fetch_array($re)){
				print $kekka[0];	
				print" : ";
				print $kekka[1];
				print" : ";			
				print $kekka[2];
				print" : ";			
				print $kekka[3];
				print"<BR>";
				}
				break;
				
			default:
				print"エラーが発生してます";
	}
	mysqli_close($conn);
?>
