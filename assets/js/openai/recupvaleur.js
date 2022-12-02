document.getElementById("sumb").addEventListener("click",getstringOfInput);
async function getstringOfInput(){
    let str = ""
    str+= str.concat(" " + document.getElementById("sexe").value);
    console.log(str);
    let res = await fetch('http://localhost:3000',{
        headers:{
            'Content-Type':'application/json'
        },
        method:'POST',
            body:JSON.stringify({
                description: str
            })
    }).then(res => res.text());
    console.log(res)
    return str
} 

getstringOfInput();


