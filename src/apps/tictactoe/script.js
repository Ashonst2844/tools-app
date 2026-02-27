const winCondition = [
    [1,2,3], [4,5,6], [7,8,9],
    [1,4,7], [2,5,8], [3,6,9],
    [1,5,9], [3,5,7]
]
playerTiles = [];
botTiles = [];

const gameWindow = document.querySelector("#gameWindow");
let isplaying = false
function playGame() {
    isplaying = true
    gameWindow.style.opacity = 1
}
function restartGame() {
    location.reload()
}

let boxes = document.querySelectorAll(".gameBox")
boxes.forEach(box => {
    let clickable = true
    box.addEventListener("click", () => {
        if (clickable&&isplaying) { 
            const inner = document.createElement("span")
            inner.textContent = "X"
            box.appendChild(inner)
            
            playerTiles.push(parseInt(box.id))

            let botMove = Math.floor(Math.random() * 9) + 1
            while (playerTiles.includes(botMove) || botTiles.includes(botMove)) {
                botMove = Math.floor(Math.random() * 9) + 1
            }
            const botBox = document.getElementById(botMove)
            const botInner = document.createElement("span")
            botInner.textContent = "O"
            botBox.appendChild(botInner)
            botTiles.push(botMove)

            clickable = false

            if (winCondition.some(condition => condition.every(tile => playerTiles.includes(tile)))) {
                alert("Kamu Menang!")
                restartGame()
            } else if (winCondition.some(condition => condition.every(tile => botTiles.includes(tile)))) {
                alert("Kamu Kalah!")
                restartGame()
            }
        }
    })
});