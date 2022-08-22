<?php
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM tables");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update</title>
</head>
<body>
<?php
if(mysqli_num_rows($result)>0){
?>
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
   </tr>
</thead>
<tbody>
	<?php
		$i=0;
		while ($row=mysqli_fetch_array($result)) {
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
         <td><a href="post.php?id=<?php echo $row['id'];?>">Update</a></td>
    </tr>
    <?php
    $i++;
}
?>
</tbody>
<?php
}
else
{
	echo"No Record Found";
}
?>
</body>
</html>