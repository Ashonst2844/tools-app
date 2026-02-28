<!DOCTYPE html>
<html lang="en">

<?php include "src/backend/connect.php"; ?>
<?php
$query = "SELECT * FROM websitedb ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools.me</title>
    <link rel="stylesheet" href="src/style.css">
    <script src="https://kit.fontawesome.com/29575beb59.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="apps" class="container"></section>
    <section id="webs" class="container">
        <?php while ($webs = mysqli_fetch_array($result)): ?>
            <a href="<?= htmlspecialchars($webs['link']) ?>" target="_blank" class="button">
                <i class="<?=
                    ($webs['icon'] === null || $webs['icon'] === "")
                    ? "fa-solid fa-globe"
                    : htmlspecialchars($webs['icon'], ENT_QUOTES)
                    ?>"></i>

                <h1><?= htmlspecialchars($webs['name']) ?></h1>
            </a>
        <?php endwhile ?>
        <button onclick="openWindow(document.querySelector('.formBox'))" class="button">
            <i class="fa-solid fa-plus"></i>
        </button>

        <div class="formBox">
            <form action="src/backend/addWebs.php" method="post"
                style="height: 200px; grid-template-rows: auto auto auto auto;">
                <input type="text" name="webName" id="webName" placeholder="Name" required>
                <input type="text" name="webLink" id="webLink" placeholder="Link" required>
                <input type="text" name="webIcon" id="webIcon"
                    placeholder="Icon Class (Font Awesome) [ex. fa-solid fa-font-awesome]" required>
                <input type="submit" value="Add Website" class="button">
            </form>
            <button onclick="closeWindow(document.querySelector('.formBox'))" class="cancelButton button">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

    </section>

    <script src="src/main.js"></script>
</body>

</html>