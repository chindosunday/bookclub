<?php
require_once("partials/header.php");
?>
<div class="container">
    
    <div class="row">
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
            <span><b>Oluwaseun Ibukun</b></span>
            <span><i>Member Since Jan 20th , 2023</i></span>
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Registered Users</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FullName</th>
      <th scope="col">Role</th>  
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Tobechukwu Osa</td>    
      <td>User</td> 
      <td>
        <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Tobechukwu Osa</td>    
      <td>Admin</td> 
      <td> <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Tobechukwu Osa</td>    
      <td>User</td> 
      <td> <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a></td>
    </tr>
  </tbody>
</table>

      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>