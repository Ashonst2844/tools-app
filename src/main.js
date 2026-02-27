var apps = [
    {
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
        link: "src/apps/todo/todo.html"
    },
    {
        name: "Randomizer",
        icon: "fa-solid fa-shuffle",
        link: "src/apps/randomizer/index.html"
    },
    {
        name: "Tic-Tac-Toe",
        icon: "fa-solid fa-border-all",
        link: "src/apps/tictactoe/tictactoe.html"
    }
]
var webs = [
    {
        name: "ChatGPT",
        icon: "fa-solid fa-robot",
        link: "https://chat.openai.com/"
    },
    {
        name: "GeminiAI",
        icon: "fa-solid fa-robot",
        link: "https://gemini.google.com/"
    },
    {
        name: "Google Drive",
        icon: "fa-brands fa-google-drive",
        link: "https://drive.google.com/"
    },
    {
        name: "Google Docs",
        icon: "fa-solid fa-file-word",
        link: "https://docs.google.com/"
    },
    {
        name: "FontAwesome",
        icon: "fa-solid fa-font-awesome",
        link: "https://fontawesome.com/"
    }
]

let appsSorter = apps.sort((a, b) => a.name.localeCompare(b.name))

const appsParent = document.querySelector("#apps")
for (let app of appsSorter) {
    const link = document.createElement("a")
    link.href = app.link
    link.title = app.name
    link.target = "_blank"

    const icon = document.createElement("i")
    icon.className = app.icon
    link.appendChild(icon)

    const name = document.createElement("h1")
    name.textContent = app.name
    link.appendChild(name)

    appsParent.appendChild(link)
}
let websSorter = webs.sort((a, b) => a.name.localeCompare(b.name))
const websParent = document.querySelector("#webs")
for (let web of websSorter) {
    const link = document.createElement("a")
    link.href = web.link
    link.title = web.name
    link.target = "_blank"

    const icon = document.createElement("i")
    icon.className = web.icon
    link.appendChild(icon)

    const name = document.createElement("h1")
    name.textContent = web.name
    link.appendChild(name)

    websParent.appendChild(link)
}