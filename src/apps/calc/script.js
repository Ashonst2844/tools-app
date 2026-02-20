var display = document.querySelector("#display");

var onOperation = "";

function appendNumber(number) {
    onOperation += number;
    display.textContent = onOperation;
}
function appendOperator(opr) {
    onOperation += opr;
    display.textContent = onOperation;
}
function clearAll() {
    onOperation = "";
    display.textContent = onOperation;
}
function del() {
    onOperation = onOperation.slice(0, -1);
    display.textContent = onOperation;
}
function calculate() {
    try {
        var result = eval(onOperation);
        display.textContent = result;
        onOperation = result
    } catch (error) {
        alert("Error input!");
        location.reload();
    }
}