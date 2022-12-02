var date = new Date();
var initialDate = date.getTime();

if (sessionStorage.getItem('appuiEaster') != 'true') {
    sessionStorage.setItem('appuiEaster', 'false');
}

let btn1 = document.getElementById("deux");
let btn2 = document.getElementById("trois");
let btn3 = document.getElementById("un");
let btn4 = document.getElementById("quatre");
let btn5 = document.getElementById("cinq");
btn1.addEventListener("click", alert1);
btn2.addEventListener("click", alert2);
btn3.addEventListener("click", alert3);
btn4.addEventListener("click", alert4);
btn5.addEventListener("click", alert5);


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
    document.getElementById("pmod").textContent = "La prochaine salle doit etre accessible depuis un autre écran";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}


function hideAll(){
    document.getElementById('un').hidden = true;
    document.getElementById("deux").hidden = true;
    document.getElementById("trois").hidden = true;
    document.getElementById('quatre').hidden = true;
    document.getElementById('cinq').hidden = true;
}

/* porte bleu*/
function alert2(){
    var date2 = new Date();
    let finalDate = date2.getTime() - initialDate;
    let add = finalDate + parseInt(getCookie('temps'));
    document.cookie = "temps = " + add;
    document.location.href = "lastpage.php";
}


function alert3(){
    hideAll();
    if (sessionStorage.getItem('appuiEaster') == 'true') {
        document.getElementById("pmod").textContent = "easter egg déjà trouvé !";
        document.getElementById('modal').style.display = 'block';
        document.getElementById("modal-close").addEventListener("click", fermer);
    }
    else {
        document.getElementById("pmod").textContent = "easter egg !! Vous gagnez 20 points !";
        sessionStorage.setItem('appuiEaster', 'true');
        img = document.createElement('img');
        img.style.width = '50px';
        img.style.height = '50px';
        img.style.marginTop = '20px';
        img.src = '../../Image/egg.png';
        allScore = parseInt(getCookie('score')) + 20;
        document.cookie = "score = " + allScore;
        document.getElementById("pmod").appendChild(img);
        document.getElementById('modal').style.display = 'block';
        document.getElementById("modal-close").addEventListener("click", fermer);
    }
}

/* les 2 écrans de gauche*/
function alert4(){
    hideAll();
    document.getElementById("pmod").textContent = "Non pas cet écran !";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

function alert5(){
    hideAll();
    document.getElementById("pmod").textContent = "La porte bleue amène vers la sortie";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}
function fermer(){
    document.getElementById("pmod").textContent = "";
    document.getElementById("modal").style.display = 'none';
    visibleAll();
}

function visibleAll(){
    document.getElementById('un').hidden = false;
    document.getElementById('deux').hidden = false;
    document.getElementById("trois").hidden = false;
    document.getElementById("quatre").hidden = false;
    document.getElementById("cinq").hidden = false;
}
