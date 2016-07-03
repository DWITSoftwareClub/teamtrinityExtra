<?php
include("conn.php");
$fname=$_POST["fname"];

$lname=$_POST["lname"];
$cno=$_POST["ctzn"];
$location=$_POST["location"];

$pass=$_POST["password"];
$user=$_POST["username"];
$enc=MD5($pass);
$utype=$_POST["regtype"];
$query="";

if($_POST["fname"]==""  or $_POST["lname"]=="" or $_POST["ctzn"]=="" or $_POST["location"]==""
 or $_POST["username"]=="" or $_POST["password"]=="" or $_POST["regtype"]=="" ){
echo "Please fill out all the fields properly.";
    $conn->close();
    die();

}else{
   if(!preg_match("/[A-Z][a-z]*/",$fname)){
        echo "First Name error";
       die();
   }
   
   }
   if(!preg_match("/[A-Z][a-z]*/",$lname)){
        echo "Last Name error";
       die();
   }
   /*$ch==0;
    
	$i = 0;
	$num = "+";
		for($i=0;$i<4; $i++){
		$num= $num.$phone[$i];
	}
	//echo $num;
	if($num=="+9841" || $num=="+9803" || $num=="+9847" || $num=="+9809")
	{
			$ch=1;
			//echo $ch;
	}
	if($ch==0){
		echo "</br>"."Invalid Phone no.";
		die();
	}*/
	if(!preg_match("/[a-zA-Z0-9]*/",$user)){
        echo "Invalid username";
       die();
   }
    
    
    
   
    //$query="";
    $query="INSERT INTO user_info VALUES ('','$fname','$lname','$cno','$location','$user','$enc','$utype')";

//echo $query;

if($conn->query($query)===TRUE){
    echo "Registration Complete";
}else{
    echo "Registration Failed";
}
$conn->close();

?>