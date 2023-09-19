<?php
require_once("partials/header.php");
require_once("guard/userguard.php");
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
          <p>You can use the navigation at the top of the page to move around the site and the navigations below to carry out tasks on the platform</p>
          <p><a href="editprofile.php">Edit My Profile</a></p>
          <p><a href="changepassword.php">Change Password</a></p>

          <?php
          require_once("partials/logoutform.php");
          ?>

        </div>
      </div>
    </div>


  </div>
</div>





<?php
require_once("partials/footer.php");
?>