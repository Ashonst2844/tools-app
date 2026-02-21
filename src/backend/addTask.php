<?php
include "connect.php";

$text = $_POST["taskText"];

$query = "INSERT INTO tododb (text, state) VALUES ('$text', false)";
mysqli_query($conn, $query);
header("Location: ../apps/todolist/todolist.php")
    ?>