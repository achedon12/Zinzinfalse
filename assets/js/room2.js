var date = new Date();
var initialDate = date.getTime();

if (sessionStorage.getItem('appuiEaster1') != 'true') {
    sessionStorage.setItem('appuiEaster1', 'false');
}

let btn1 = document.getElementById("un");
let btn2 = document.getElementById("deux");
let btn3 = document.getElementById("quatre");
btn1.addEventListener("click", alert1);
btn2.addEventListener("click", alert2);
btn3.addEventListener("click", alert3);

function getCookie(name) {
    let cookie = {};
    document.cookie.split(';').forEach(function(el) {
        let [k,v] = el.split('=');
        cookie[k.trim()] = v;
    })
    return cookie[name];
}

function alert1(){
    hideAll();
    document.getElementById("pmod").textContent = "1234";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

function hideAll(){
    document.getElementById("un").hidden = true;
    document.getElementById("deux").hidden = true;
    document.getElementById("quatre").hidden = true;
}

function alert2(){

    hideAll();
    if (sessionStorage.getItem('appuiEaster1') == 'true'){
        document.getElementById("pmod").textContent = "easter egg déjà trouvé !";
        document.getElementById('modal').style.display = 'block';
    }
    else {
        sessionStorage.setItem('appuiEaster1', 'true');
        document.getElementById("pmod").textContent = "easter egg !! Vous gagnez 20 points !";
        img = document.createElement('img');
        img.style.width = '50px';
        img.style.height = '50px';
        img.style.marginTop = '20px';
        img.src = '../../Image/egg.png';
        allScore = parseInt(getCookie('score')) + 20;
        document.cookie = "score = " + allScore;
        document.getElementById('pmod').appendChild(img);
        document.getElementById('modal').style.display = 'block';
        document.getElementById("modal-close").addEventListener("click", fermer);
    }
}

function alert3(){
    hideAll();
    input = document.createElement("input");
    input.type = 'text';
    input.id="inpCode";
    valid = document.createElement("input");
    valid.type = 'submit';
    valid.value = 'Valider';
    valid.addEventListener("click", validate);
    document.getElementById("pmod").append(input);
    document.getElementById("pmod").append(valid);
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);

}

function validate(){
    if (document.getElementById('inpCode').value == '1234'){
        var date2 = new Date();
        let finalDate = date2.getTime() - initialDate;
        let add = finalDate + parseInt(getCookie('temps'));
        document.cookie = "temps = " + add;
        document.location.href='room.php';
    }
    else {
        alert("Erreur de code !");
    }
}
function fermer(){
    document.getElementById("pmod").textContent = "";
    document.getElementById("modal").style.display = 'none';
    document.getElementById("un").hidden = false;
    document.getElementById("deux").hidden = false;
    document.getElementById("quatre").hidden = false;
}

