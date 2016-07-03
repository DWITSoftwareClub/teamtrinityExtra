<?php
include("conn.php");

$user=$_POST["username"];
$pass= $_POST["password"];
$login=$_POST["logintype"];
$enc=MD5($pass);

$query="";

if($_POST["username"]=="" or $_POST["password"]=="" or $_POST["logintype"]==""){
    
    echo "Please fill the fields properly.";
    
}else{
    
    $query="SELECT * FROM user_info WHERE uname ='$user' and pword ='$enc' and utype='$login'";
}
//echo $query;
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    echo "success";
}else{
    echo "Login Failed. Please try again.";
}

    


?>