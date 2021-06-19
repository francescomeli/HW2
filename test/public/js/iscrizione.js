function onResponse(response){
    return response.text();
}

function ch_username(text){
    const controllo=document.querySelector("#check_username");

    if(text=="1"){
        controllo.classList.remove("hidden");
    }
    else{
        controllo.classList.add("hidden");
    }
}

function c_username(){
    const username=document.querySelector("#username").value;

    fetch(REGISTER_ROUTE+"/username/"+username).then(onResponse).then(ch_username);
}

function ch_email(text){
    const controllo=document.querySelector("#check_email");

    if(text=="1"){
        controllo.classList.remove("hidden");
    }
    else{
        controllo.classList.add("hidden");
    }
}

function c_email(){
    const email=document.querySelector("#email").value;

    fetch(REGISTER_ROUTE+"/email/"+email).then(onResponse).then(ch_email);
}

function c_passw(){
    const password=document.querySelector("#passw").value;
    const errore=document.querySelector("#check_password");

    if(password.length<6){
        errore.classList.remove("hidden");
    }
    else{
        errore.classList.add("hidden");
    }
}


const username=document.querySelector("#username");
username.addEventListener("blur",c_username);

const email=document.querySelector("#email");
email.addEventListener("blur",c_email);

const password=document.querySelector("#passw");
password.addEventListener("blur",c_passw);
