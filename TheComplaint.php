<?php
// define variables and set to empty values
$nameErr = $emailErr ="";
$name = $email = $comment ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
  $to = "bebocool67@gmail.com";
  $subject = "complaint";
  $message = "NAME: " .  $name . "\r\n" . "EMAIL: " .  $email . "\r\n". "THE COMPLAINT :" . "\r\n". $comment  ;
  $from = "bebocool67@gmail.com";
  $headers = "From:" . $email;
  if(mail($to,$subject,$message,$headers)){
      echo"email sent successfully to " . $to ;
  } else {
      echo"sorry , failed while sending mail!";
  }
  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    // $dsn = "mysql:host=localhost;dbname=tantauniversity" ; 
    // $user = "root" ;
    // $pass = "" ; 
    // $option = array(
    //     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" // FOR Arabic
    // );
    //   $con = new PDO($dsn , $user , $pass , $option ); 
    //   $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
      
    //           $insert_data = $con -> query("INSERT INTO complaint (name , email, the_complaint )
    //           VALUES ('$name', '$email', '$comment')"); 
    header('location: submitted.html');
  ?>            