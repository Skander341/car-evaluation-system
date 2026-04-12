<?php

$license = $_POST['license'];
$model = $_POST['model'];
$e1 = $_POST['e1'];
$e2 = $_POST['e2'];
$e3 = $_POST['e3'];

$con = mysqli_connect("localhost","root","","database");

if (!$con) {
   die("Connection error: " . mysqli_connect_error());
} else {

    // Check if tester exists
    $req = "SELECT * FROM tester WHERE licenseNumber = '$license'";
    $res = mysqli_query($con,$req);
    $nb = mysqli_num_rows($res);

    if ($nb == 0) {
        echo "<h1>Tester not registered</h1>";
    } else {

        // Check if already tested this model
        $req2 = "SELECT * FROM evaluation 
                 WHERE licenseNumber = '$license' 
                 AND modelId = '$model'";
        $res2 = mysqli_query($con,$req2);
        $nb2 = mysqli_num_rows($res2);

        if ($nb2 != 0) {
            echo "<h1>You have already tested this model</h1>";
        } else {

            // Insert evaluation
            $req3 = "INSERT INTO evaluation 
                     VALUES ('$license', '$model', NOW(), '$e1', '$e2', '$e3')";
            $res3 = mysqli_query($con,$req3);

            if (mysqli_affected_rows($con) != 0) {
               echo "<h1>Evaluation successfully recorded</h1>";
            } else {
                echo "<h1>Evaluation failed</h1>";
            }
        }
    }
}

mysqli_close($con);
?>