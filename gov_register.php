<?php
include("conn.php");
$uname=$_POST["username"];
$dname=$_POST["department"];
$eid=$_POST["emp_id"];
$work_loc=$_POST["work_loc"];

$query="";
if($_POST["department"]=="" or $_POST["emp_id"]=="" or $_POST["work_loc"]=="" ){
echo "Please fill out all the fields properly.";
    $conn->close();
    die();

}else{
 
    
	$query1= "select u_id from user_info where uname='$uname'";
	$rr1= mysqli_query($conn,$query1);
	$u_id= mysqli_num_rows($rr1);
	
	$query1= "select l_id from location where loc='$work_loc' ";
	$rr1= mysqli_query($conn,$query1);
	$d_id= mysqli_num_rows($rr1);
	
    $query="INSERT INTO gov_info VALUES ('$u_id','$dname','$d_id','$eid','','$work_loc')";
}
//echo $query;$query="";

if($conn->query($query)===TRUE){
    echo "Registration Complete";
}else{
    echo "Registration Failed";
}
$conn->close();
}
?>