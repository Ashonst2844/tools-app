let hDis = document.querySelector("#hour");
let mDis = document.querySelector("#minute");
let sDis = document.querySelector("#second");

const t = 60;

let counting = null;

function reset() {
    location.reload();
}

function playStop(timer) {
    var totalTime;

    if (counting !== null) {
        clearInterval(counting);
        counting=null;
        return;
    }

    var h = parseInt(hDis.value*t*t) || 0;
    var m = parseInt(mDis.value*t) || 0;
    var s = parseInt(sDis.value) || 0;

    if (totalTime==0) {
        totalTime = h+m+s;
    } else {
        totalTime = timer;
    }
    console.log(totalTime)

    if (!totalTime) {
        alert("Enter You Time")
    } else { 
        counting = setInterval(function () {
            if (totalTime <= 0) {
                alert("TimeOut");
                clearInterval(counting)
            } else {

                totalTime--;
                hDis.value = Math.floor(totalTime/(t*t));
                console.log(hDis.value);

                mDis.value = Math.floor((totalTime-(hDis.value*(t*t)))/t);
                console.log(mDis.value)

                sDis.value = totalTime%t
                console.log(sDis.value)
                console.log(totalTime)
            }
        }, 1000)
    }
}