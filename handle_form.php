<body>

<!--This first part will take the information and add it to the database
 lablesson, chatroom, -->

<? 
if( $_POST )

//Here is where I should be able to connect to the database.

$con = mysql_connect("localhost","root","nickolas");

if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }
  
  mysql_select_db("lablesson", $con)
 
// If that worked, I should be able to connect to the table 

  $period = $_POST['period'];
  $email = $_POST['email'];
  $comments = $_POST['comments'];
  
// Online tip to protect the form 

  $email = mysql_real_escape_string($email);
  $comments = mysql_real_escape_string($comments);
  
// The acutal part

$query = "
INSERT INTO `lablesson`.`chatroom` 
(`email`, `period`, `comments`, `time`) 
VALUES ('$email', '$period', '$comments', CURRENT_TIMESTAMP);

?>


<!--This second part should be what the User see as "Anonymous" 
It should just show the Email address and thats it.
It will be impossible to edit however; unless the person has access to the database. -->

<h4> Your email address is: <b> <?php echo $_POST["email"]; ?> </b> 
<p> We will respond when you get a reply. </p> </h4>
<p> Just 'X' out this tab. You're done. </p>

</body>