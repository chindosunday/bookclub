<?php
session_start();
require_once("partials/header.php");
require_once("guard/userguard.php");

require_once("classes/User.php"); //to get the details of the user

$user_id = $_SESSION["user_id"];

$userone = new User();
$user = $userone->getUserDetails($user_id);

print_r($user);
?>
<div class="container">
    
    <div class="row">
             
    <!-- the sidebar is here -->
  <?php
  require_once("partials/sidebar.php");
  ?>

  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Welcome <?php echo $user["user_fullname"];?></h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <h2 class="text-center">Edit Profile</h2>
       <form action="updateprofile.php" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">FullName</label>
                <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="emailHelp" value="<?php echo $user["user_fullname"];?>">
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">User Intro</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="intro"><?php echo $user["user_Intro"];?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-danger" name="updateProf">Update Profile</button>
       </form>
       
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>