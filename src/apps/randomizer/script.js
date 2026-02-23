let lists = [];

function enter() {
    const listValue = document.querySelector("#items");

    if (listValue.value && listValue.value.trim() !== "") {
        lists.push(listValue.value);
        listValue.value = "";
        updateList();
    }
}

function deleteList() {
    lists.pop();
    updateList();
}

function clearList() {
    lists = [];
    updateList();
}

function updateList() {
    const previewSect = document.querySelector("#previewSect");
    previewSect.innerHTML = `<button onclick="deleteList()">Delete</button>`;
    lists.forEach(list => {
        previewSect.innerHTML += `<span>${list}</span>`;
    });
}

function randomizing() {
    const resultSect = document.querySelector("#resultSect");

    if (lists.length > 0) {
        const randomIndex = Math.floor(Math.random() * lists.length);
        const span = document.createElement("span");
        span.textContent = lists[randomIndex];
        resultSect.appendChild(span);
        lists.splice(randomIndex, 1);
        updateList();
    }
}