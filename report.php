<?php

$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"database");

if (!$con) {
   die("connection error: " . mysqli_connect_error());
} else {
    $req = "SELECT M.label,
                   AVG(safety) AS e1,
                   AVG(driving) AS e2,
                   AVG(comfort) AS e3,
                   COUNT(E.modelId) AS nb
            FROM evaluation E, carmodel M
            WHERE (E.modelId = M.modelId)
            AND YEAR(testDate) = YEAR(NOW())
            GROUP BY (E.modelId)";

    $res = mysqli_query($con,$req);
    $nb = mysqli_num_rows($res);

    if ($nb == 0) {
        echo "<h1>No evaluation for the current year</h1>";
    } else {
        echo "<table border='2'>
        <tr>
            <th>Model</th>
            <th>Safety</th>
            <th>Driving</th>
            <th>Comfort</th>
            <th>Number of tests</th>
        </tr>";

        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['label'] . "</td>";
            echo "<td>" . $row['e1'] . "</td>";
            echo "<td>" . $row['e2'] . "</td>";
            echo "<td>" . $row['e3'] . "</td>";
            echo "<td>" . $row['nb'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    td, th {
        padding: 15px;
    }
</style>
<body>

</body>
</html>