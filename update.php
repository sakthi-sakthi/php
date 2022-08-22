<?php
include 'db.php' ;
$fnameErr = $lnameErr = $dobErr= $genderErr = $emailErr=  $phoneErr= $subErr= $imageErr="";
$fname = $lname = $dob = $gender = $email = $phone= $sub= $image="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  if (empty($_POST["fname"])) 
  {
    $fnameErr = "First Name is required";
  }
  else 
  {
    $fname = get($_POST["fname"]);
  }

  if (empty($_POST["lname"]))
  {
    $lnameErr = "Last Name is required";
  } 
  else
  {
    $lname = get($_POST["lname"]);
  }
    
  if (empty($_POST["dob"]))
  {
    $dobErr = "DOB is required";
  } 
  else
  {
    $dob = get($_POST["dob"]);
  }

  if (empty($_POST["gender"]))
  {
    $genderErr = "Gender is required";
  }
  else
  {
    $gender = get($_POST["gender"]);
  }

  if (empty($_POST["email"]))
  {
    $emailErr = "Email is required";
  } 
  else
  {
    $email = get($_POST["email"]);
  }

  if (empty($_POST["phone"]))
  {
    $phoneErr = "Mobile No is required";
  }
  else
  {
    $phone = get($_POST["phone"]);
  }

  if (empty($_POST["sub"]))
  {
    $subErr = "Subject is required";
  }
  else
  {
    $sub = get($_POST["sub"]);
  }
   /*if (empty($_POST["image"]))
  {
    $imageErr = "Image is required";
  }
  else
  {
    $image = get($_POST["image"]);
  }
*/
    $target_path = "photos/"; 
    $profile = ( $_FILES['image']['name']);
    $target_path = $target_path.basename( $_FILES['image']['name']);

    if(isset($profile))
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
    }

    if ($fname !="" && $lname !="" && $dob !="" && $gender !="" && $email !="" && $phone !="" && $sub !=""  && $profile !="") 
    {
      $query="UPDATE tables set fname='$fname',lname='$lname',dob='$dob',gender='$gender',email='$email',phone='$phone',sub='$sub',image='$profile' where id='".$_GET['id']."'";

   $run=mysqli_query($conn,$query) or die(mysqli_error());


    if($run)
    {
      print_r("Informations are Submitted Successfully");
      header('location:view.php');
    }
    else
    {
      print_r("Informations are not Submitted");
    }
}
}



function get($sakthi) 
{
  $sakthi = trim($sakthi);
  $sakthi = stripslashes($sakthi);
  $sakthi = htmlspecialchars($sakthi);
  return $sakthi;
}
if(isset($_GET['id']))
{
    $query="select * from tables where id='".$_GET['id']."'";

    $run=mysqli_query($conn,$query) or die(mysqli_error());
?>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>Update-Form</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body onload="check()">
<center>
    </center>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <center>
                    <h1 class="title"><b>UPDATE FORM </b></h1>
                    </center>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <?php
                            while ($row = $run->fetch_assoc())
                            { ?>
                                <div class="input-group">
                                    <label class="label"><b>First Name</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="text" name="fname" placeholder="Enter Your First Name" value="<?php echo $row['fname']; ?>">
                                    <span class="error"><?php echo $fnameErr;?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Last Name</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $row['lname'];?>">
                                    <span class="error"><?php echo $lnameErr;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="input-group-icon">
                                    <label class="label"><b>DOB</b><span class="error">*</span></label>
                                        <input class="" type="date" name="dob" value="<?php echo $row['dob'];?>">
                                        <i class=""></i>
                                        <span class="error"><?php echo $dobErr;?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="p-t-10">
                                    <label class="label"><b>Gender</b><span class="error">*</span></label>
                                        <label class="radio-container m-r-46">Male
                                            <input type="radio" name="gender" value="Male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="Female">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Others
                                            <input type="radio" name="gender" value="Others">
                                            <span class="checkmark"></span>
                                        </label>
                                        <span class="error"><?php echo $genderErr;?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Email</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="email" name="email" placeholder="Enter Your Email" value="<?php echo $row['email'];?>">
                                    <span class="error"><?php echo $emailErr;?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Mobile Number</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="text" name="phone" placeholder="Enter Your Mobile Number" value="<?php echo $row['phone'];?>">
                                    <span class="error"><?php echo $phoneErr;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label"><b>Subject</b><span class="error">*</span></label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="sub">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Lamp Technology</option>
                                    <option>Python</option>
                                    <option>Java</option>
                                    <option>Asp.Net</option>
                                    <option>Software Testing</option>
                                    <option>Dbms</option>
                                    <option>C</option>
                                    <option>C++</option>
                                    <option>Data Structure</option>
                                    <option>Ruby</option>
                                    <option>R Language</option>
                                    <option>HTML</option>
                                    <option>Technical Writing</option>
                                    <option>Jquery</option>
                                    <option>Javascript</option>
                                    <option>Go</option>
                                    <option>Django</option>
                                    <option>Sql</option>
                                    <option>React JS</option>
                                    <option>Angular JS</option>
                                </select>
                                <div class="select-dropdown"></div>
                                <span class="error"><?php echo $subErr;?></span>
                            </div>
                            <?php  } } ?> 
                        </div>
                        <div class="col-2">
                                <div class="input-group">
                                    <label class="label"><b>Upload Image</b><span class="error">*</span></label>
                                    <input class="input--style-4" type="file" name="image" placeholder="Profile Images">
                                    <span class="error"><?php echo $imageErr;?></span>
                                </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--green" type="submit" onclick="alert('Your Records are Updated Sucessfully')">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>
</html>
