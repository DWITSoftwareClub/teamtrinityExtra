<?php

$dbname="open_complaint";
$username="root";
$password="sujin";
$server="localhost";
$conn=mysqli_connect($server,$username,$password);
$conn1=mysqli_select_db($conn,$dbname);
/*if($conn){
    echo "connection success";
}else{
    echo "connection failed";
}*/

?>