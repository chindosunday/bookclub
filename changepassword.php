<?php
require_once("partials/header.php");
require_once("guard/userguard.php"); //used to guard only pages that allow only users
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
        <h5 class="mb-0">Welcome Oluwaseun!</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <h2 class="text-center">Change Password</h2>
       <form action="process/processpasswordchange.php" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Old Password</label>
                <input type="password" name="oldpassword" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="changepassword" class="btn btn-danger">Change Password</button>
       </form>
       
      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>