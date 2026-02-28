var apps = [{
                name: "Calculator",
                icon: "fa-solid fa-calculator",
                link: "src/apps/calc/calc.html"
            },
            {
                name: "Timer",
                icon: "fa-regular fa-clock",
                link: "src/apps/timer/timer.html"
            },
            {
                name: "To Do List",
                icon: "fa-solid fa-list-check",
                link: "src/apps/todolist/todolist.php"
            },
            {
                name: "Randomizer",
                icon: "fa-solid fa-shuffle",
                link: "src/apps/randomizer/random.html"
            },
            {
                name: "Tic-Tac-Toe",
                icon: "fa-solid fa-border-all",
                link: "src/apps/tictactoe/game.html"
            },
            {
                name: "Scientific Calculator",
                icon: "fa-solid fa-brain",
                link: "src/apps/scicalc/scicalc.html"
        }]

let appsSorter = apps.sort((a, b) => a.name.localeCompare(b.name))

const appsParent = document.querySelector("#apps")
for (let app of appsSorter) {
    const link = document.createElement("a")
    link.href = app.link
    link.title = app.name
    link.className = "button"

    const icon = document.createElement("i")
    icon.className = app.icon
    link.appendChild(icon)

    const name = document.createElement("h1")
    name.textContent = app.name
    link.appendChild(name)

    appsParent.appendChild(link)
}
let websSorter = webs.sort((a, b) => a.name.localeCompare(b.name))

// CONTROL PAGE
function closeWindow(target, id) {
    target.style.display = "none"
}
function openWindow(target, id) {
    target.style.display = "flex"
}