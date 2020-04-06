<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>welcome</title>
	<style>
.div3{
    width:100%;
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
li img {
    width:100px;
    height:100px;
}
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
  background-size: 100% 630px;
  color:white;
  padding:20px;
  font-size:35px;
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
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   h4,h1,h3{
       color:black;
   }

</style>
</head>
<body style="background:#CCC;">
<div class="div3">
<div class="div1">
    <a href='index.php'>Home</a>
<a href='findmatch'>FindMatch</a>
<a href='#profile1'>profile</a></div>
    <div class="div2">
<a href='logout.php?logout'>Logout</a>
</div>
</div>
<div class="imgdev">

<img src="images/couple2.jpg" width="100%" height="500px">
</div>
<section class="slider">
    <h1 align='center'> Our Success stories</h1>
	 <h3>Happy Marriage</h3>
	 <div class="flexslider">
		<ul class="slides">
		  <li>
			<img src="images/rade.jpg" alt=""/>
			<h4>Ranveer & Deepika</h4>
			<p>First meeting is always special for a couple. The excitement of meeting someone 
                new, who could just probably become the one you decide to spend your entire life 
                with, is amazing. The tingling feeling you get in your stomach when you are looking
                 forward to meet the person and how you just cannot eat or sleep thinking of that person.
                 The lovely pair says that their bond became stronger during their wedding preparations.
                  Pooja says, “We were always connected through phone calls to discuss about our wedding.
                   The best thing is we accepted each other’s opinions so that both of us are happy with how 
                   the wedding is arranged. We both are not so fond of shopping and so we spent only little time 
                   in that and did it together but it was fun too.” And she continued speaking about their wedding 
                   day, “It was a perfect day filled with happiness and emotional moments. All our friends and relatives 
                   were by our side to share our joy.The best moment for both of us was when he tied the knot.”</p>
		  </li>
		  <li>
			<img src="images/vka.jpg" alt=""/>
			<h4>Virat & Anushka</h4>
			<p>Manickam visited his homeland in India for a vacation and returned to 
                Belgium as a married man after two weeks. I was in complete awe when
                 he started our conversation with this. Curious to know how this happened, 
                 I ask Manickam about the same, to which he says, “I met Mahalakshmi at a 
                 temple and got married to her within a week.It all started with a request 
                 from her when I was in Belgium. We both got talking and she expressed a liking 
                 for me. But, I was clear about one thing. Even though I was fond of her too, I 
                 wanted to make a decision only after meeting her in person,</p>
		  </li>
		  <li>
			<img src="images/chsa.jpg" alt=""/>
			<h4>Naga Chaitanya & Samantha</h4>
			<p>"Everything seems like a dream. I feel we are destined to be together. I never thought we would
                 end up together when I first sent her a request two years back. But now, I’m holding the hands 
                 of the woman I love, and we are expecting our baby soon," begins an elated Arun, who thinks that
                  he made the best decision of his life by marrying Megala. Read on to know how Arun found the love of his life…

With a lot of bewilderment in the mind, he met Megala for the first time at her home. “I was completely 
blank on our first meet. I didn’t know what to speak to her,"</p>
		  </li>
	    </ul>
	  </div>
   </section>
   <div id="profile1">
       <h1 align="center">Your Profile</h1>   
   <?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "matrimonyphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$usermain='cherry';
$sql = "SELECT  username, email,image,salary,job,mobile, dateofbirth, gender FROM users where username='$usermain'";
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
?>  
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\matrimonylarav\resources\views/user/welcome.blade.php ENDPATH**/ ?>