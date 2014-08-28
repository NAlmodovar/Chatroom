<body>

<!--This first part will take the information and add it to the database
 lablesson, chatroom, -->

<?php
$con=mysqli_connect("localhost","root","nickolas", "lablesson");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$period = mysqli_real_escape_string($con, $_POST['period']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$comments = mysqli_real_escape_string($con, $_POST['comments']);

$sql="INSERT INTO chatroom 
(email, period, comments, time)
VALUES ('$email', '$period', '$comments', CURRENT_TIMESTAMP)";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?>



<!--This second part should be what the User see as "Anonymous"  
It should just show the Email address and thats it.
It will be impossible to edit however; unless the person has access to the database. -->
<center>
<p>
<p>
<p>
<h4> Your email address is: <b> <?php echo $_POST["email"]; ?> </b> 
<p> We will respond when you get a reply. </p> </h4>
<p> Just 'X' out this tab. You're done. </p>
</center>


</body>