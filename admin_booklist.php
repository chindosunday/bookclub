<?php
require_once("partials/header.php");
require_once("classes/Book.php");

$book1 = new Book();
$books = $book1->fetchBook();


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
        <h5 class="mb-0">Available Books</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="admin_addbook.php" class="btn btn-success">Add New Book</a>
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>  
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
    foreach($books as $book){
      ?>


 <tr>
      <th scope="row">3</th>
      <td><?php echo $book["bk_title"]?></td>   
      <td><?php echo $book["bk_description"]?></td>
      <td><a href='delete.php' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</a>
        &nbsp;&nbsp;
        <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
        &nbsp;&nbsp;
        <a href='details.html' class='btn btn-sm btn-success'><i class='fa fa-list'></i>Edit</a>
      </td>
    </tr>

<?php
    }
  ?>



    
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