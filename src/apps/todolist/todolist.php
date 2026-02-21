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
                    <span class="taskText"><?php echo htmlspecialchars($tasks['text']) ?></span>
                    <button class="checkButton"><i class="fa-solid fa-check"></i></button>
                    <button class="editButton"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="deleteButton"><i class="fa-solid fa-trash"></i></button>
                </div>

            <?php endwhile ?>
            <button id="addTask" class="tasks" onclick="openNewTask()">
                <i class="fa-solid fa-plus"></i>
            </button>
            <div id="addNewTask">
                <form id="form" action="../../backend/addTask.php" method="post">
                    <input type="text" name="taskText" id="taskText" required>
                    <input type="submit" value="ADD">
                </form>
                <button onclick="closeNewTask()">CANCEL</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>