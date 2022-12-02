
let btn1 = document.getElementById("un");
let btn2 = document.getElementById("deux");
let btn3 = document.getElementById("trois");
let btn4 = document.getElementById("quatre");
let btn5 = document.getElementById("cinq");
let btn6 = document.getElementById("six");

btn1.addEventListener("click", alert1);
btn2.addEventListener("click", alert2);
btn3.addEventListener("click", alert3);
btn4.addEventListener("click", alert4);
btn5.addEventListener("click", alert5);
btn6.addEventListener("click", alert6);

/*grand écran*/
function alert1(){
    hideAll();
    document.getElementById("pmod").textContent = "Es-tu sûr de vouloir affronté la prochaine étape ? Tu as assez révisé ? On m'a dit que la salle a beaucoup d'info, j'irais vérifier personnellement !";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
    input = document.createElement("input");
    input.type = 'submit';
    input.id = "inpCode";
    input.value = 'Oui';
    input2 = document.createElement("input");
    input2.type = 'submit';
    input2.id = "inpCode2";
    input2.value = "Non";
    document.getElementById("pmod").appendChild(input);
    document.getElementById("pmod").appendChild(input2);
    document.getElementById("inpCode").addEventListener("click", validate);
    document.getElementById("inpCode2").addEventListener("click", fermer);
}

function validate(){
    document.location.href = "quizz.php";
}

/*écran tout au fond a droite*/
function alert2(){
    hideAll();
    document.getElementById("pmod").textContent = 'VIH signifie Virus de l Immunodéficience Humaine, il s attaque à des cellules qui coordonnent l immunité. SIDA signifie Syndrôme d ImmunoDéficience Acquise. Si pas de traitement du VIH après un certain temps, les cellules coordonnant l immunité peuvent devenir de moins en moins nombreuses donc l’immunité sera moins efficace. Des maladies profitant de la diminution de l’immunité peuvent se développer, on les appelle les maladies opportunistes. Lorsqu une personne a une ou plusieurs maladies de ce type, on dit qu elle a le SIDA. Une personne étant séropositive au VIH n’est pas forcément infectée par le SIDA et elle peut ne jamais le développer. On les appelle les contrôleurs du VIH. Ils ont une charge virale indétectable ou presque. Ils représentent moins de 1% des personnes porteuses du VIH. “On ne peut pas avoir d’enfant quand on a le SIDA” : Le désir d’enfant est tout à fait envisageable quand on est séropositif-ve au VIH. Il est toutefois nécessaire d’anticiper la grossesse pour pouvoir bénéficier d’une prise en charge médicale adaptée et éviter le risque de contamination de l’enfant.'
    document.getElementById( 'modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);

}

/*écran 3 de gauche*/
function alert3(){
    hideAll();
    document.getElementById("pmod").textContent = '38,4 millions de personnes vivaient avec le VIH fin 2021. Symptômes : chez 6% des femmes et 11% des hommes, chez les femmes sont pertes, douleurs en bas du ventre, douleurs urinaires. Chez les hommes, il y a urétrite, infections anorectales. Pour la mycose, Chez la femme, il y a irritation vaginale pertes inodore, blanches démangeaisons Vulve irritée et aspect rouge. Chez l’homme, il y a gland irrité  écoulement et démangeaisons dépôt blanchâtre. Pour HPV, il y a rarement de symptômes, condylomes (différents types) aka plaques de boutons. Pour l’herpès génital, primo-infection : asymptomatique dans la plupart des cas sinon éruption vésiculeuse douloureuse + fièvre, malaise général… Résurgences, il y a des boutons de fièvre ou éruptions génitales sur le territoire de la première infection.';
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

/*écran 1 de gauche*/
function alert4(){
    hideAll();

    document.getElementById("pmod").textContent = 'Syphilis : infection bactérienne responsable de lésions de la peau et des muqueuses pouvant toucher de nombreux organes. HPV (papillomavirus humains) : 200 types de HPV, dont environ 40 peuvent infecter les organes génitaux des hommes et des femmes. Les autres types de papillomavirus infectent la peau et sont responsables de verrues cutanées.  Herpès génital : Après la primo infection, le virus herpétique s’installe dans l’organisme et s’y « endort », puis se manifeste ensuite lors de poussées par de petites cloques évoluant en plaies, localisées sur les organes sexuels ou à proximité. Cette infection peut resurgir plusieurs fois chez la même personne au cours de sa vie.  Ces résurgences ou poussées se produisent à un rythme variable, parfois de façon asymptomatique. La mycose est une infection des organes génitaux par un champignon de type levure. Elle est extrêmement fréquente et banale notamment chez la femme. Certaines IST sont des causes majeures de stérilité. Elles sont d’autant plus dangereuses qu’elles ne présentent pas nécessairement de symptômes visibles. En cas d’infection à chlamydia, les bactéries peuvent provoquer l’inflammation des trompes de Fallope et donc provoquer la stérilité. ';
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

/*ajouter si bcp trop d'info*/
function alert5(){
    hideAll();
    document.getElementById("pmod").textContent = "Les moments pour faire des tests : Si jamais fait auparavant c’est le seul moyen de savoir si vous avez le VIH ou pas. Si vous ne vous protégez pas toujours lors de relations sexuelles, il est recommandé de faire un test au moins une fois par an. Si vous envisagez une vie de couple, faites tous les deux un test pour arrêter l’usage de préservatif. Si vous avez été ou êtes usager de drogues par voie intraveineuse et que vous avez échangé du matériel d'injection avec d'autres usagers de drogues, il vaut mieux faire un dépistage. Lors de rapports sexuels non protégés par un préservatif avec pénétration vaginale et/ou pénétration anale, lors d'une fellation, par voie sanguine lors de partage du matériel d’injection en cas d’usage de drogues injectables, d’échanges de paille pour sniffer et en cas de piqûre accidentelle avec du matériel de soins contaminé pour les professionnels de la santé ,de la mère à l’enfant au cours de la grossesse ou de l’allaitement. Le risque de transmission est nul si la charge virale de la personne séropositive est indétectable. Lors d’un rapport sexuel avec une personne infectée par le virus, la transmission n’est pas systématique, elle peut intervenir au premier rapport comme ne pas intervenir du tout.";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

function alert6(){
    hideAll();
    document.getElementById("pmod").textContent = "Après une prise de risque, si une personne a été contaminée par le VIH, il est possible dans 20 à 50 % des cas que certains symptômes apparaissent entre la période de 5 à 30 jours après la contamination appelée primo-infection. Les symptômes les plus fréquents sont : fièvre, maux de têtes, ganglions gonflés. Ils disparaissent généralement après quelques jours ou semaines. Trithérapie : association de trois molécules pour renforcer le traitement. Il existe différentes trithérapies en fonction des molécules utilisées. Charge virale : quantité de virus présents dans le sang circulant. Celle-ci est indétectable lorsqu’elle ne peut pas être mesurée, à partir de 40-50 copies de virus par ml de sang. Si une personne séropositive sous traitement a une charge virale indétectable depuis plus de 6 mois, et qu’elle n’a pas d’IST, on considère que le VIH ne peut plus se transmettre. Traitement post exposition : La prophylaxie pré-exposition, abrégé PrEP est un traitement médicamenteux qui empêche l'infection par le virus du sida chez des personnes qui ont été exposées au VIH. Toutes les études démontrent l’efficacité de la PrEP. Son utilisation, lorsqu’elle est étendue à une large échelle, contribue à faire baisser les taux de contamination au VIH. Ce médicament doit être pris pendant 28 jours, si possible moins de 4 heures après le risque ou jusqu’à 48h après.";
    document.getElementById('modal').style.display = 'block';
    document.getElementById("modal-close").addEventListener("click", fermer);
}

function hideAll(){
    document.getElementById("un").hidden = true;
    document.getElementById("deux").hidden = true;
    document.getElementById("trois").hidden = true;
    document.getElementById("quatre").hidden = true;
    document.getElementById("cinq").hidden = true;
    document.getElementById("six").hidden = true;
}

function fermer(){
    document.getElementById("pmod").textContent = "";
    document.getElementById("modal").style.display = 'none';
    document.getElementById("un").hidden = false;
    document.getElementById("deux").hidden = false;
    document.getElementById("trois").hidden = false;
    document.getElementById("quatre").hidden = false;
    document.getElementById("cinq").hidden = false;
    document.getElementById("six").hidden = false;
}
