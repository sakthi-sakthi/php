

<?php
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM tables");

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "DELETE FROM `tables` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE) 
     { 
        header('location:view.php');
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
          }
} 
?>

