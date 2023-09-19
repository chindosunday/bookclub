<?php

    require_once("classes/User.php"); //we did not come out becos we need it 

    $user_id = $_SESSION["user_id"];

    $userone = new User();
    $user = $userone->getUserDetails($user_id);


?>


<div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Profile</h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <img src="assets/images/dp.jpg" class="img-fluid rounded-circle">
            </div>
             <div class="col-12 text-center">
            <button type="button" class="btn btn-primary btn-block btn-sm">
          Change Picture
        </button>
       </div>
            <hr>
            <div>
            <span><b><?php echo $user["user_fullname"];?></b></span>
            <span><i>Member Since <?php echo date("Y", strtotime($user["user_created"]))?></i></span>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div>