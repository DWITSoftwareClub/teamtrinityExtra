<?php
include("conn.php");
$ptopic =$_POST["title"];
$pdes=$_POST["description"];
$votes=0;

$uname=$_POST["username"];
$location=$_POST["location"];
$date=date('Y-m-d');
//echo $date;
$query="";

if($_POST["title"]=="" or $_POST["description"]==""  or $_POST["location"]=="" ){
    echo "Please fill out all the fields properly.";
    $conn->close();
    die();

}else{
   // echo "sdfsdfasf";
	$query1= "select u_id from user_info where uname='$uname'";
	$rr1= mysqli_query($conn,$query1);
	//$u_id= mysqli_num_rows($rr1);
	$row = mysqli_fetch_array($rr1);
	$uid=$row['u_id'];
	/*$query1=" select max(pid) from problem";
	$rr1=mysqli_query($conn,$query1);
	//$pid=mysqli_num_rows($rr1);
	$row = mysqli_fetch_array($rr1);
	$pid=$row['pid'];
	$pid=$pid+1;*/
	$query1= "select l_id from location where loc='$location'";
	$rr1= mysqli_query($conn,$query1);
	//$d_id= mysqli_num_rows($rr1);	
    $row = mysqli_fetch_array($rr1);
	$did=$row['l_id'];
    echo $did;
    $query="INSERT INTO problem VALUES ('','$ptopic','$pdes','$votes','unsolved','$uid','$did','$date','unknown')";

}
//echo $query;

if($conn->query($query)===TRUE){
    echo "Your problem has been posted";
}else{
    echo "Sorry, Post failed";
}
$conn->close();

?>