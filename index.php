<?php
require_once("partials/header.php");
require_once("classes/Book.php");

 $bk = new Book();
 $books = $bk->fetchBook();

// print_r($books);

//fetch proverbs from an api
// $url = "http://localhost/provab/api/v1/proverb/read.php";
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// //curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($curl);
// $result = json_decode($result);
// curl_close($curl);

//echo "<pre>";
//print_r($result);
//echo "</pre>";

?>
<section class="hero">
  <div class="hero-text-container">
    <h1 class="hero-heading">Welcome to <span>Buka</span></h1>
    <p class="hero-subheading">Share and read about books that changes life and stories</p>
    <a href="register.php" class="btn hero-button  btn-primary">Register</a>
    <a href="login.php" class="btn hero-button  btn-primary">Login</a>
  </div>
  <img class="hero-image" src="assets/images/hero.jpg" alt="Hero Image">
</section>

<section class="latest_book py-3">
  <div class="container">
    <div class="row">
      <h1 class="text-center py-3">Latest Books</h1>

      <?php
      foreach($books as $book){
        ?>

  <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $book["bk_title"];?></h5>
          <p class="card-text"><?php echo $book["bk_description"];?></p>
        <a href="bookdetail.php?id=<?php echo $book["bk_id"];?>" class="btn btn-primary">View Detail</a>
      </div>
      </div>

  </div>


<?php
      }
      ?>
    </div>
  </div>

</section>

    <section>
      <?php
    //   if($result->success){
    //     foreach($result->data as $proverb){
    //       ?>

         <h1><?php //echo $proverb->pro_body ?></h1>

       <?php
    //     }
    //   }
    //   ?>
     </section>


<?php
require_once("partials/footer.php");
?>