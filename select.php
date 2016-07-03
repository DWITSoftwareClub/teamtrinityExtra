<?php
require_once('conn.php');
$username  = $_GET['username'];

//$username="sujin123";
//for user's location based problem
$uproblem=" SELECT problem.ptopic,problem.pdes,problem.votes,problem.tracker
 from user_info,problem,location WHERE user_info.uname='".$username."' and user_info.location=location.loc AND problem.d_id=location.l_id ";
/*$probuser="SELECT problem.ptopic,problem.pdes,problem.votes,problem.tracker
 from user_info INNER JOIN problem on user_info.u_id=problem.u_id WHERE user_info.uname='".$username."' ";
$comment="SELECT cmnt.cmt,cmnt.com_vote FROM cmnt WHERE cmnt.pid=1";
*/
$result=mysqli_query($conn,$uproblem);
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