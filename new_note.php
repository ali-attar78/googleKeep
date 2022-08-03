<?php
include "dataBase.php";




if (isset($_POST["title"]) && isset($_POST["note"]) && isset($_POST["status"])) {

    $title=$_POST["title"];
    $note=$_POST["note"];
    $status=$_POST["status"];

   

        $db->query("INSERT INTO note(title,note,status_id) VALUES('$title','$note','$status')");

        header("Location:index.php");
   

}






?>
