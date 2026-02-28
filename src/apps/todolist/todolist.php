<!DOCTYPE html>

<html lang="en">

<?php include "../../backend/connect.php"; ?>
<?php
$query = "SELECT * FROM tododb ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools.me - To Do List</title>
    <link rel="stylesheet" href="../../style.css">
    <script src="https://kit.fontawesome.com/29575beb59.js" crossorigin="anonymous"></script>
</head>

<body style="flex-direction: column;">

    <a href="../../../index.php" class="backButton button"><i class="fa-solid fa-angle-left"></i></a>
    <div class="card" style="width: 20%; height: 20%;">
        <?php
        $totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM tododb");
        $totalData = mysqli_fetch_assoc($totalQuery);
        $counter = $totalData['total'];
        $doneQuery = mysqli_query($conn, "SELECT COUNT(*) as done FROM tododb WHERE state = 1");
        $doneData = mysqli_fetch_assoc($doneQuery);
        $done = $doneData['done'];
        ?>

        <span id="counter">
            <b><?php echo $done ?></b>/
            <b><?php echo $counter ?></b><i style="font-size:0.6em">Tasks</i>
        </span>

    </div>
    <div class="card" style="width: 80%; height: 80%;">
        <div id="taskBox">
            <?php while ($tasks = mysqli_fetch_array($result)): ?>
                <div class="tasks">
                    <span class="taskText <?= $tasks['state'] ? 'done' : '' ?>">
                        <?= htmlspecialchars($tasks['text']) ?>
                    </span>
                    <form action="../../backend/checkTask.php" method="post" class="button actionButton">
                        <input type="hidden" name="id" value="<?= $tasks['id']; ?>">
                        <button style="background-color: rgba(0,0,0,0); width: 100%; height: 100%;" type="submit"
                            class="checkForm">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>

                    <div class="button actionButton">
                        <button
                            style="background-color: rgba(0,0,0,0); background-color: rgba(0,0,0,0); width: 100%; height: 100%;"
                            id="editTaskButton" onclick="openWindow(document.querySelector('.form1'))">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </div>

                    <form action="../../backend/deleteTask.php" method="post" class="button actionButton">
                        <input type="hidden" name="id" value="<?php echo $tasks['id']; ?>">
                        <button
                            style="background-color: rgba(0,0,0,0); background-color: rgba(0,0,0,0); width: 100%; height: 100%;"
                            type="submit" class="deleteButton">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="formBox form1">
                    <form class="form" action="../../backend/editTask.php" method="post"
                        style="height: 100px; grid-template-rows: auto auto;">
                        <input type="text" name="newTask" id="newTask" placeholder="Edit Task" required>
                        <input type="hidden" name="id" value="<?= $tasks['id'] ?>">
                        <input type="submit" value="EDIT" class="button">
                    </form>
                    <button onclick="closeWindow(document.querySelector('.form1'))" class="cancelButton button">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

            <?php endwhile ?>
            <button id="addTask" onclick="openWindow(document.querySelector('.form2'))" class="button tasks">
                <i class="fa-solid fa-plus"></i>
            </button>
            <div class="formBox form2">
                <form class="form" action="../../backend/addTask.php" method="post"
                    style="height: 100px; grid-template-rows: auto auto;">
                    <input type="text" name="taskText" id="taskText" placeholder="Add New Task" required>
                    <input type="hidden" name="taskState" value="false">
                    <input type="submit" value="ADD" class="button">
                </form>
                <button onclick="closeWindow(document.querySelector('.form2'))" class="cancelButton button">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    </div>

    <script src="../../main.js"></script>
    <script src="script.js"></script>
</body>

</html>