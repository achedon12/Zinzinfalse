
var date = new Date();
var initialDate = date.getTime();
document.cookie = "temps = 0";
document.cookie = "score = 0";
let btn1 = document.getElementById("un");
btn1.addEventListener("click", alert1);

function alert1(){
    var date2 = new Date();
    let finalDate = date2.getTime() - initialDate;
    document.cookie = "temps = " + finalDate;
    console.log(finalDate);
    document.location.href = "room2.php";
}

