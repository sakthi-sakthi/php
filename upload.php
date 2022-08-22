<?php  
include 'db.php';
$target_path = "photos/";  
$target_path = $target_path.basename( $_FILES['image']['name']);
  
if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
?>