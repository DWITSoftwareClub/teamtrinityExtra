<?php
include("conn.php");
$ptitle =$_POST["title"];
$uname=$_POST["username"];
$tracker=$_POST["tracker"];
//$uid=5;
//$pid=1;

	$query1= "select pid from problem where ptopic='$ptitle'";
	$rr1= mysqli_query($conn,$query1);
	$pid= mysqli_num_rows($rr1);
	
	$query1= "select u_id from user_info where uname='$uname'";
	$rr1= mysqli_query($conn,$query1);
	$uid= mysqli_num_rows($rr1);
	
	$query1= "select utype from user_info where u_id='$uid'";
	$rr1= mysqli_query($conn,$query1);
	//$result= mysqli_num_rows($rr1);
	$row = mysqli_fetch_array($rr1);
	$utype=$row['utype'];
   // echo $utype;
	if($utype=="gov")
	{
		$query = "UPDATE problem SET problem.tracker='".$tracker."' WHERE pid=1";
	}
	else{
		echo "You are not authorized to edit this element.";
		$query="";
	}

//echo $query;

if($conn->query($query)===TRUE){
    echo "Tracking successful";
}else{
    echo "Tracking failed";
}
$conn->close();


?>
