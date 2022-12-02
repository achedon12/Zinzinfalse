
var date = new Date();
initialDate = date.getTime();
let btn1 = document.getElementById("un");
btn1.addEventListener("click", alert1);

function alert1(){
    console.log(date.getTime());
    console.log(initialDate);
    let finalDate = date.getTime() - initialDate;
    document.cookie = "temps = " + finalDate;
    console.log(finalDate);
    //document.location.href = "room2.php";
}

function getCookie(name) {
    let cookie = {};
    document.cookie.split(';').forEach(function(el) {
        let [k,v] = el.split('=');
        cookie[k.trim()] = v;
    })
    return cookie[name];
}