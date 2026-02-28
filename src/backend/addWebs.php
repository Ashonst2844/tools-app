<?php
include "connect.php";

$name = $_POST["webName"];
$link = $_POST["webLink"];
$icon = $_POST["webIcon"];

if ($icon === "" || !preg_match('/^fa[srlb]?\sfa-/', $icon)) {
    $icon = "fa-solid fa-globe";
}

$query = "INSERT INTO websitedb (name, link, icon) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $name, $link, $icon);
$stmt->execute();

$stmt->close();
header("Location: ../../index.php");
exit;
?>