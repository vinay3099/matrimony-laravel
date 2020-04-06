<?php
    session_start();

    if(isset($_SESSION['User']))
    {
        $usermain ='cherry';
    }
    else
    {
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>find match</title>
	<style>
.slider
{
    width:100%;
    background-image:url('images/background.jpg');
    color:yellow;
    padding:30px;
    font-family:cursive;
}
#profile1{
  background: url('images/bgimg.jpg');
  background-repeat: no-repeat;
  background-size: 100% 100%;
  color:white;
  padding:20px;
  font-size:25px;
}
 #img_div{
   	width: 320px;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   #img_1{
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   .div3{width:100%;
    height:65px;
    padding:10px;
    background-image:url('images/couple2.jpg');


}
.div1 a{
    float:left;
    text-decoration:none;
    color:white;
    font-size:25px;
    margin-right:20px;
}
.div2 a{
    text-decoration:none;
    color:white;
    font-size:25px;
    float:right;
    
}

</style>
</head>
<body style="background:#CCC;">
<div class="div3">
<div class="div1">
    <a href='index.php'>Home</a>
<a href='welcome.php'>Mainpage</a></div>
    <div class="div2">
<a href='logout.php?logout'>Logout</a>
</div>
</div>
</section>
   <div id="profile1">
       <h1 align="center">Matched Profiles</h1>   
   <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "matrimonyphp";
$usermain="cherry";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1="SELECT gender FROM users where username= '$usermain'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $gender1=$row["gender"];
    }
}  

if($gender1=='male')
{
$sql = "SELECT  username, email, image, salary, job, mobile, dateofbirth, gender FROM users where username!='$usermain' and gender='female'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."'id='img_1'"." >";
      echo "</div>";
        echo "Name: " . $row["username"]. "<br>";
        echo " Email: ". $row["email"]. "<br>";
        echo " mobile: ". $row["mobile"]. "<br>";
        echo " Gender: ". $row["gender"]. "<br>";
        echo " Date of Birth: ". $row["dateofbirth"]. "<br>";
        echo " Salary: ". $row["salary"]. "<br>";
        echo " Job Details: ". $row["job"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
}
else{
    $sql = "SELECT  username, email,image,salary,job,mobile, dateofbirth, gender FROM users where username!='$usermain' and gender='male'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."'id='img_1'"." >";
      echo "</div>";
        echo "Name: " . $row["username"]. "<br>";
        echo " Email: ". $row["email"]. "<br>";
        echo " mobile: ". $row["mobile"]. "<br>";
        echo " Gender: ". $row["gender"]. "<br>";
        echo " Date of Birth: ". $row["dateofbirth"]. "<br>";
        echo " Salary: ". $row["salary"]. "<br>";
        echo " Job Details: ". $row["job"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
}

?>  
</div><?php /**PATH C:\xampp\htdocs\matrimonylarav\resources\views/user/findmatch.blade.php ENDPATH**/ ?>