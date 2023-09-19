<?php
require_once("partials/header.php");
require_once("classes/Book.php");

if(isset($_GET['id'])){
    $book_id = $_GET["id"];
    $bk = new Book();
    $book = $bk->getBookDetail($book_id);

echo "<pre>";
    //print_r($book);
    "</pre>";

}else{
    header("location:index.php");
    exit();
}
?>


<h1>Book Details</h1>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h1> Title: <?php echo $book["bk_title"]?></h1>
            <h3> Category: <?php echo $book["cat_title"]?></h3>
            <h3> Author: <?php echo $book["bk_author"]?></h3>
            <h3> Publisher: <?php echo $book["bk_publisher"]?></h3>
            </div>

          

                <?php
                    if(isset($_SESSION["user_id"])){
                ?>

                <div class="col-md-6">
                <h1>Add your summary below</h1>
                    <form action="process/processsummary.php" method="post">

                    <?php
                        if(isset($_SESSION["sum_form_error"])){
                            echo "<p>".$_SESSION["sum_form_error"]."</p>";
                            unset($_SESSION["sum_form_error"]);
                        }
                    ?>

                        <input type="hidden" name="book_id" value="<?php echo $book["bk_id"];?>">

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a Summary" id="floatingTextarea2" style="height: 100px" name="sum_content"> 
                            </textarea>
                            <label for="floatingTextarea2">Summary</label>
                        </div>
                        <input type="submit" value="Add Summary" name="summarybtn" class="btn btn-primary">
                    </form>
                    </div>

                        
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
require_once("partials/footer.php");
?>