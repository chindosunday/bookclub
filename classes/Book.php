<?php

require_once("Dbconnection.php");

class Book extends Dbconnection{

    private $conn;

    public function __construct(){
        $this->conn = $this->connect();
    }

    public function insertBook($bk_title, $bk_category_id, $bk_author, $bk_publisher,  $bk_cover_image,$bk_description, $bk_published_year){

        $sql = "INSERT INTO books(bk_title, bk_category_id, bk_author, bk_publisher, bk_description, bk_published_year, bk_cover_image)VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $bookcreated = $stmt->execute([$bk_title, $bk_category_id, $bk_author, $bk_publisher, $bk_description, $bk_published_year, $bk_cover_image]);

        if( $bookcreated){
            header("location:../admin_booklist.php");
            //return "Book successfully added to database";
            exit();
        }else{
            return "Error:Book not added to database";
            exit();
        }

    }


    public function fetchBook(){
        $sql = "SELECT * FROM books ORDER BY bk_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $books;

    }

    public function getBookDetail($book_id){
        $sql = "SELECT * FROM books INNER JOIN category on books.bk_category_id = category.cat_id WHERE books.bk_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$book_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // public function deleteBook($book_id){
    //     $sql = "DELETE FROM books WHERE bk_id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $bookdeleted = $stmt->execute([$book_id]);
    //     if($bookdeleted){
    //         header("location:../admin_booklist.php");
    //         exit();
    //     }
    // }

}

//$newBook = new Book();
