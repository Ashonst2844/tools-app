<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools.me - To Do List</title>
    <link rel="stylesheet" href="../../style.css">
    <script src="https://kit.fontawesome.com/29575beb59.js" crossorigin="anonymous"></script>
</head>

<body style="flex-direction: column;">
    <a href="../../../index.php" id="backButton"><i class="fa-solid fa-angle-left"></i></a>
    <div class="card" style="width: 80%; height: 20%;">

    </div>
    <div class="card" style="width: 80%; height: 80%;">
        <div id="taskBox">
            <?php include "../../backend/connect.php"; ?>
            <?php
            $query = "SELECT * FROM tododb ORDER BY id DESC";
            $result = mysqli_query($conn, $query);
            ?>
            <?php while ($tasks = mysqli_fetch_array($result)): ?>
                <div class="tasks">
                    <span class="taskText <?= $tasks['state'] ? 'done' : '' ?>">
                        <?= htmlspecialchars($tasks['text']) ?>
                    </span>
                    <form action="../../backend/checkTask.php" method="post" class="checkForm">
                        <input type="hidden" name="id" value="<?= $tasks['id']; ?>">
                        <button style="background-color: rgba(0,0,0,0);" type="submit" class="checkButton button">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>

                    <div id="editBox">
                        <button style="background-color: rgba(0,0,0,0);" id="editTaskButton" onclick="openEditBox()">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </div>

                    <form action="../../backend/deleteTask.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $tasks['id']; ?>">
                        <button style="background-color: rgba(0,0,0,0);" type="submit" class="deleteButton button">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div id="editTask">
                    <form id="edit" action="../../backend/editTask.php" method="post">
                        <input type="text" name="newTask" id="newTask" required>
                        <input type="hidden" name="id" value="<?= $tasks['id'] ?>">
                        <input type="submit" value="EDIT">
                    </form>
                    <button onclick="closeEditBox()">CANCEL</button>
                </div>

            <?php endwhile ?>
            <button id="addTask" class="tasks" onclick="openNewTask()">
                <i class="fa-solid fa-plus"></i>
            </button>
            <div id="addNewTask">
                <form id="form" action="../../backend/addTask.php" method="post">
                    <input type="text" name="taskText" id="taskText" required>
                    <input type="hidden" name="taskState" value="false">
                    <input type="submit" value="ADD">
                </form>
                <button onclick="closeNewTask()">CANCEL</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>