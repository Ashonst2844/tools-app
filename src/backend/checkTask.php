<?php
include "connect.php";

$id = $_POST["id"];

$query = "UPDATE tododb SET state = NOT state WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
header("Location: ../apps/todolist/todolist.php");
exit;
?>