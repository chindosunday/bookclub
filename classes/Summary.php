<?php

require_once("Dbconnection.php");

class Summary extends Dbconnection{

    public function insertSummary($sum_content, $sum_user_id, $sum_book_id){
        $sql = "INSERT INTO summaries(sum_content, sum_user_id, sum_book_id) VALUES(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $summaryStored = $stmt->execute([$sum_content, $sum_user_id, $sum_book_id]);
        return $summaryStored;
    }
}

?>