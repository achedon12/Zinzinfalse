
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

function alert1(){
    hideAll();
    document.getElementById("pmod").textContent = "La prochaine salle doit etre accesible depuis un autre écran";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}


function hideAll(){
    document.getElementById("deux").hidden = true;
    document.getElementById("trois").hidden = true;
}
/* porte bleu*/
function alert2(){
    document.location.href = "page.php";
}


function alert3(){
    hideAll();
    document.getElementById("trois").hidden = true;
    document.getElementById("pmod").textContent = "easter egg (trouver quoi)";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

/* les 2 écrans de gauche*/
function alert4(){
    hideAll();
    document.getElementById("pmod").textContent = "Ratio bouffon";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

function alert5(){
    hideAll();
    document.getElementById("pmod").textContent = "La porte bleu amène vers la sortie";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}
function fermer(){
    document.getElementById("pmod").textContent = "";
    document.getElementById("modal").style.display = 'none';
    document.getElementById("trois").hidden = false;
    document.getElementById("deux").hidden = false;
}
