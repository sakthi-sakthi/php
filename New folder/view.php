<?php 

include "db.php";

$sql = "SELECT * FROM tables";

$result = $conn->query($sql);
//echo "<pre>";print_r($result->fetch_assoc());
?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>First Name</th>

        <th>Last Name</th>

        <th>Date of Birth</th>

        <th>Gender</th>

        <th>Email</th>

        <th>Phone</th>

        <th>Subject</th>


    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                //echo "<pre>";print_r($result->fetch_assoc());

                while ($row = $result->fetch_assoc()) {

                    

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['fname']; ?></td>

                    <td><?php echo $row['lname']; ?></td>

                    <td><?php echo $row['dob']; ?></td>

                    <td><?php echo $row['gender']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['phone']; ?></td>

                    <td><?php echo $row['sub']; ?></td>

                    </tr>                       

        <?php       }

            }else{

                echo "No records";
            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>

