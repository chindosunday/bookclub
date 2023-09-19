<?php

    require_once "../classes/Book.php";

if($_POST){
    if(isset($_POST["addbook"])){
        $bk_title = $_POST["title"];
        $bk_author = $_POST["author"];
        $bk_published_year = $_POST["year"];
        $bk_category_id = $_POST["category"];
        $bk_publisher = $_POST["publisher"];
        $bk_description = $_POST["desc"];


      

      
        //validation
        if(empty($bk_title) || empty($bk_author) || empty($bk_published_year) || empty($bk_category_id)
        || empty($bk_publisher) || empty($bk_description)){
            echo "All fields are required";
        }

        //image validation from file upload
        $allowed = ["jpeg", "png", "jpg", "webp", "jfif"];
        $file_name = $_FILES["cover"]["name"];
        $temp = $_FILES["cover"]["tmp_name"];
        $error = $_FILES["cover"]["error"];
        //strtolower converts from uppercase to lowercase eg PNG, JPG
        $uploaded_ext =strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if(!in_array($uploaded_ext, $allowed)){
            echo "File type not allowed. Please upload Image";
            exit();
        }
        
        if($error == 0){
            $fileName = "../bookcover/"."buka".time(). ".".$uploaded_ext;
            $savedfile = move_uploaded_file($temp, $fileName);
        if($savedfile){
                //echo "File uploaded successfully";

                $book1 = new Book();
                $result = $book1->insertBook( $bk_title, $bk_category_id, $bk_author, $bk_publisher, $fileName, $bk_description, $bk_published_year);
                echo $result;
            }
        }
    


    }

}



?>