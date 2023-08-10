<?php
// Check if the form is submitted
if(isset($_POST['submit'])) 
{
  // Retrieve the form data
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    

  // Perform any necessary validation on the form data

  // Connect to your MySQL database
  $host = "localhost";
  $username = "NALCOHMS";
  $db_password = "";
  $dbname = "hosteldb";

  $con = mysqli_connect($host, $username, $db_password, $dbname);

  // Check connection
  if (!$con) {
    die("Connection failed!! " . mysqli_connect_error());
  }

  // Prepare and bind the insert statement
  if($_POST["password"] == $_POST["cpassword"]){
    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO login (roll_no, name, password) VALUES ('$roll_no', '$name', '$hashpass')";
    // Execute the insert statement
    $rs = mysqli_query($con, $sql);
    if($rs) {
      header("Location: login.html");
      exit();
    } else {
      echo "Error: " . mysqli_error($con); // Print the error message if the query fails
    }
  } else {
    echo "passwords are not matching";
  }
  

  // Close connection
  mysqli_close($con);
}
?>