
<?php
include "db_conn.php";
$id=$_GET['id'];

if(isset($_POST['submit']))
{
 $first_name =$_POST['userfirstname'];
 $last_name=$_POST['userlastname'];
 $email =$_POST['usermail'];
 $gender=$_POST['usergender'];

 $sql="UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";
 $result=mysqli_query($conn,$sql);

 if($result)
 {
  header("Location: index.php?msg=Record updated successfully");
 }
 else
 {
  echo "Failed: ".mysqli_error($conn);
 }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <!-- Bootstrap -->

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <title>PHP CRUD operations</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

 <nav class="navbar navbar-light text-white justify-content-center fs-1 mb-2" style="background-color:royalblue;">
  PHP CRUD Operations Application
 </nav>

 <div class="container mt-5 mb-5">
  <div class="text-center">
  <h3>Edit User Details</h3>
  <p class="text-muted">User informations</p>

  </div>
  
  <?php

  $sql="SELECT * FROM `crud` WHERE id=$id LIMIT 1";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  ?>
  <!-- form -->

  <div class="container-fluid mt-5">
   <form method="post" action="" style="width:80vw;min-width:300px;">
   <div class="row">
    <div class="col">
     <label class="form-label" for="userfirstname">First name
     </label>
       <input type="text"
         class="form-control" name="userfirstname" id="userfirstname" placeholder="Enter ur first name" value="<?php echo $row['first_name']?>">
     </div>
     <div class="col mx-auto">
     <label class="form-label" for="userlastname">Last name
     </label>
       <input type="text"
         class="form-control" name="userlastname" id="userlastname" placeholder="Enter ur last name" value="<?php echo $row['last_name']?>">
     </div>
     <div class="continer mt-5 mb-3">
     <label class="form-label" for="usermail">Gmail
     </label>
       <input type="text"
         class="form-control" name="usermail" id="usermail" placeholder="@gmail.com" value="<?php echo $row['email']?>">
     </div>
     <div class="form-group mt-5">
      <label>Gender :
      </label> &nbsp;
      <input type="radio" name="usergender" id="usermale" class="form-check-input" value="Male" <?php echo ($row['gender']=='Male')?"checked":"";?>>
       <label class="form-label" for="usermale">Male
      </label> &nbsp;
      <input type="radio" name="usergender" class="form-check-input"  id="userfemale" value="Female" <?php echo ($row['gender']=='Female')?"checked":"";?>>
       <label class="form-label" for="userfemale">Female
      </label>&nbsp;
     </div>


     <div>
      <button type="submit" name="submit" class="btn btn-primary mt-5">UPDATE</button>
      <a href="index.php" class="btn btn-danger mt-5 mx-3">Cancel</a>
     </div>
    </div>
   </div>
   </form>
  </div>
 </div>
</body>
</html>