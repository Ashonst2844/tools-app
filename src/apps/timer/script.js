const hDis = document.querySelector("#hour");
const mDis = document.querySelector("#minute");
const sDis = document.querySelector("#second");

function reset() {
    hDis.value = 0;
    mDis.value = 0;
    sDis.value = 0;
}
function playStop() {
    console.log(`H = ${hDis.value}, M = ${mDis.value}, S = ${sDis.value}`)
}