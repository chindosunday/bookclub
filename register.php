<?php
require_once("partials/header.php");


?>
<div class="container-fluid bg-white">

    <div class="row">
        
        <div class="col-md-3"></div>

        <div class="col-md-6  bg-primary py-3 my-5 px-5">
            <h1 class="text-center text-white">Sign Up</h1>
            <form action="process/registerprocess.php" method="POST" py-5 px-5>
                <div class="mb-3">
                    <label for="fullname" class="form-label">FullName</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">User Intro</label>
                    <textarea class="form-control" name="intro" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


                <button type="submit" name="register" class="btn btn-danger">Submit</button>
            </form>
            <p class="mt-3">Already a member?<a href="login.php" class="btn btn-default">Login Here</a></p>
        </div>
        <div class="col-md-3"></div> 
    </div> 
</div>



<?php
require_once("partials/footer.php");
?>