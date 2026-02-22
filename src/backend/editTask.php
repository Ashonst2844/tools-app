<?php
include "connect.php";

$id = $_POST["id"];
$newText = $_POST["newTask"];

$query = "UPDATE tododb SET text = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("si", $newText, $id);
$stmt->execute();

$stmt->close();
header("Location: ../apps/todolist/todolist.php");
exit;
?>