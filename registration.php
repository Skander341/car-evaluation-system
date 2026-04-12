<?php

$license = $_POST['license'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];

$con = mysqli_connect("localhost","root","","database");

if (!$con) {
   die("Connection error: " . mysqli_connect_error());
} else {
    $req = "SELECT * FROM tester WHERE licenseNumber = '$license'";
    $res = mysqli_query($con,$req);
    $nb = mysqli_num_rows($res);

    if ($nb != 0) {
        echo "<h1>License number already exists</h1>";
    } else {
        $req2 = "INSERT INTO tester VALUES ('$license', '$name', '$lastname', '$gender')";
        $res2 = mysqli_query($con,$req2);

        if (mysqli_affected_rows($con) != 0) {
           echo "<h1>Registration successful</h1>";
        } else {
            echo "<h1>Registration failed</h1>";
        }
    }
}

mysqli_close($con);
?>