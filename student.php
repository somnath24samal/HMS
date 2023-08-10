<?php
// Check if the form is submitted
if(isset($_POST['submit'])) 
{
  // Retrieve the form data
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    //$login_id = $_POST['login_id'];  
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $section = $_POST['section'];
    //$hostel = $_POST['hostel'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin_code = $_POST['pin_code'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $parents_email = $_POST['parents_email'];
    $parents_no = $_POST['parents_no'];


  // TODO: Perform any necessary validation on the form data

  // Connect to your MySQL database
  $host = "localhost";
  $username = "NALCOHMS";
  $password = "";
  $dbname = "hosteldb";

  $con = mysqli_connect($host, $username, $password, $dbname);

  // Check connection
  if (!$con) {
    die("Connection failed!! " . mysqli_connect_error());
  }

  // Prepare and bind the insert statement
  $sql ="INSERT INTO student (name, roll_no, course, branch, section, address, city, state, pin_code, phone_no, email, parents_email, parents_no) VALUES ('$name', '$roll_no', '$course', '$branch', '$section', '$address', '$city', '$state', '$pin_code', '$phone_no', '$email', '$parents_email', '$parents_no')";
  
  // Execute the insert statement
  $rs = mysqli_query($con, $sql);
  if($rs) {
    header("Location: createpass.html");
    exit();
  } else {
    echo "Error: " . mysqli_error($con); // Print the error message if the query fails
  }

  // Close connection
  mysqli_close($con);
}
?>