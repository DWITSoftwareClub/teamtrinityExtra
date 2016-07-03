 <!doctype html>
 <html lan="en">
 <head>
<meta charset="utf-8">
	<title>Moviehub</title>
	

</head>

<body>
<form method="POST" >
Username:
<input type= "text" name = "username" >
Password:
<input type= "password" name = "password" >
Login as:
<input type="radio" name = "logintype" value="public">
<input type="radio" name = "logintype" value="Gov. Official">
<input type="submit" name = "login" value="Login" >

</form>
 <?php
include("conn.php");
if(isset($_POST['login'])&& $_POST['login']=='Login')
	{
$user=$_POST["username"];
$pass= $_POST["password"];
$logintype=$_POST["logintype"];
//$logintype="public";
//$enc=MD5($pass);
echo $logintype;
//$query="";

if($_POST["username"]=="" or $_POST["password"]=="" or $_POST["logintype"]==""){
    
    echo "Please fill the fields properly.";
    
}
else{
    //echo "test";
    $query="SELECT * FROM user_info WHERE uname ='$user' and pword ='$pass' and utype='$logintype'";
	//echo $query;
}

$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    echo "success";
}else{
    echo "Login Failed. Please try again.";
}
}

    


?>
</body>
</html>