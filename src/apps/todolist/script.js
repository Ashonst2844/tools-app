const text = task.querySelectorAll(".taskText");

tasks.forEach(task => {
    const form = task.querySelector(".checkForm");

    if (!form) return;

    form.addEventListener("submit", () => {
        text.classList.toggle("done");
    });
});