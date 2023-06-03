<?php
// define variables and set to empty values
$nameErr = $emailErr ="";
$name = $email = $national_id = $level = $section = $course_name = $course_code ="";

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
    $national_id = test_input($_POST["national_id"]);
    $level = test_input($_POST["level"]);
    $section = test_input($_POST["section"]);
    $course_name = test_input($_POST["course_name"]);
    $course_code = test_input($_POST["course_code"]);
    $to = "bebocool67@gmail.com";
    $subject = "grievance";
    $message = "NAME: " .  $name . "\r\n" . "EMAIL: " .  $email . "\r\n". "LEVEL: " .  $level .  "\r\n" . "NATIONAL ID: " .  $national_id . "\r\n". "SECTION: " .  $section ."\r\n" . "COURSE NAME: " .  $course_name . "\r\n". "COURSE CODE: " .  $course_code   ;
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
      
    //           $insert_data = $con -> query("INSERT INTO grievance (email , name , national_id , level , section , course_name , course_code )
    //           VALUES ('$email', '$name', '$national_id' ,'$level','$section', '$course_name' , '$course_code')"); 
              
   header('location: submitted.html');
?>