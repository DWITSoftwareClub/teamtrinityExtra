<?php
//i is no. of latest trends you want
//require_once('conn.php');

//current date

$date=date('Y-m-d',strtotime("-1 days"));
//echo $date;

	include('conn.php');
	$query=" SELECT problem.ptopic,problem.pdes,problem.votes,problem.tracker 
	from user_info INNER JOIN problem on user_info.u_id=problem.u_id WHERE problem.date='".$date."' order by votes desc";
	$result=mysqli_query($conn,$query);
//$result=mysqli_query($conn,$uproblem);
$response = array();	
while($row=mysqli_fetch_array($result)){
		//echo $row;
        
        
    array_push($response,array(
        "ptopic"=>$row['ptopic'],
        "pdes"=>$row['pdes'],
        "votes"=>$row['votes'],
        "tracker"=>$row['tracker'],
        
    ));
	}
	
	echo json_encode(array("server_response"=>$response));
mysqli_close($conn);
		//echo $problem;


?>