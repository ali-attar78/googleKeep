<?php
include "dataBase.php";
$note_id=$_GET["note_id"];

$db->query("DELETE FROM note WHERE id=$note_id");
header("Location:index.php");


?>