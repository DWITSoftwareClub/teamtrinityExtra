<?php
include("conn.php");
$ptitle =$_POST["title"];
$count=$_POST["count"];

//echo $count;
$query="";
	$query1= "select pid from problem where ptopic='$ptitle'";
	$rr1= mysqli_query($conn,$query1);
	$pid= mysqli_num_rows($rr1);
	
	
	if($count % 2 == 0 )
	{
			$query="update problem set votes = votes -1 where pid=$pid";
	}
	else 
	{
		$query="update problem set votes = votes + 1 where pid=$pid";
	}
mysqli_query($conn,$query);
//echo $query;
/*
if($conn->query($query)===TRUE){
    echo "vote successfule";
}else{
    echo "vote failed";
}*/
$conn->close();


?>
