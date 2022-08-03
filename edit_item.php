<?php
include "dataBase.php";
$note_id=$_GET["note_id"];



if (isset($_POST["title"]) && isset($_POST["note"]) && isset($_POST["status"])) {

    $title=$_POST["title"];
    $note=$_POST["note"];
    $status=$_POST["status"];
echo $status;
   

    $db->query("UPDATE note SET title='$title',note='$note',status_id='$status' WHERE id=$note_id");

        header("Location:index.php");
   

}


?>

