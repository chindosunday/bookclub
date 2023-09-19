<?php

require_once("Dbconnection.php");
    //classs for category
    class Category extends Dbconnection{

    
            private $conn;

            public function __construct(){
                $this->conn = $this->connect();
            }

        public function fetchAllCategories(){

            $sql = "SELECT * FROM category ORDER BY cat_title";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }


    }


// $catOne = new Category();
// $category = $catOne->fetchAllCategories();
// echo "<pre>";
// print_r($category);
// echo "</pre>";


?>