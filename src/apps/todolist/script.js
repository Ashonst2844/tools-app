const newTaskContainer = document.querySelector("#addNewTask");
const editTaskContainer = document.querySelector("#editTask")

function openNewTask() {
    newTaskContainer.style.display = "flex"
}
function closeNewTask() {
    newTaskContainer.style.display = "none"
}

function openEditBox() {
    editTaskContainer.style.display = "flex"
}
function closeEditBox() {
    editTaskContainer.style.display = "none"
}

const task = document.querySelectorAll(".taskState");
const taskText = document.querySelector(".taskText")

const tasks = document.querySelectorAll(".tasks");

tasks.forEach(task => {
    const form = task.querySelector(".checkForm");
    const text = task.querySelector(".taskText");

    if (!form) return;

    form.addEventListener("submit", () => {
        text.classList.toggle("done");
    });
});