<?php
include 'db.php';
$sql="SELECT * FROM tables";
$result=$conn->query($sql);
$result = mysqli_query($conn,"SELECT *FROM tables");
session_start();


if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "DELETE FROM `tables` WHERE `id`='$id'";
     $result = $conn->query($sql);
     if ($result == TRUE) 
     {
        echo "Record deleted successfully.";
        header('location:view.php');
    }
    else
    {
        echo "Error:" . $sql . "<br>" . $conn->error;
          }
} 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>  
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>  
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"> </script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
</head>
<body>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Audios</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['sub']; ?></td>
                     <td><img src="audio/<?php echo $row['audio']; ?>"><?php echo $row['audio']; ?></td>
                   <td><a href="/colorlib-regform-4/update.php?id=<?php echo$row["id"];?>" class="btn btn-primary">Update</a></td> 
                    <td><input type="button"  name="delete" value="Delete" class="del btn btn-danger"></td>

                    <script type="text/javascript">
    $(document).ready(function() {
        $(".del").click(function(){
         swal({
            title: "Are you sure!",
            text: "Do you really want to delete record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var id="<?php echo $row['id']; ?>";
                window.location.href="delete.php ? id="+id+"";
                swal("Yaa! Record successfully deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your record is safe!", {
                    icon: "error",
                });
            }
        });
         });
    });
</script>
                    
           </tr>
                <?php
            }?>
        </tbody>
    </table>

    <center>
        <a href="/colorlib-regform-4/login.php" class="btn btn-danger">Insert</a> 
    </center>
    
            
     
        <script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});</script>
        </tbody>
</body>
</html>