 <?php

// Check if the form is submitted
if(isset($_POST['submit'])) {

    // Get the entered name, roll no, and password from the user
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Database connection details
    $host = "localhost";
    $username = "NALCOHMS";
    $db_password = ""; // Rename the variable to avoid conflict

    $dbname = "hosteldb";

    // Create a connection to the database
    $con = mysqli_connect ($host, $username, $db_password, $dbname);

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM login WHERE roll_no = '$roll_no' AND name = '$name'";
    //$hashpass = password_hash($password, PASSWORD_DEFAULT);

    // Execute the query
    $rs = mysqli_query($con, $sql);

    // Check if the query execution was successful
    if (!$rs) {
        die("Query failed: " . mysqli_error($con));
    }

    $num = mysqli_num_rows($rs);

    if ($num == 1) {
        // Fetch the row from the rs set
        $row = mysqli_fetch_assoc($rs);

        // Verify the password
        if(password_verify($password, $row['password'])){
          header("Location: index.html");
          exit();
        }
        else {
            echo "Invalid Password: " . $password . "<br>";
            echo "Invalid Password: " . $row['password'] . "<br>";
        }
    } else {
        echo "Invalid Credentials";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
