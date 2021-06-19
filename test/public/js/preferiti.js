function onResponse(response){
    console.log('Risposta ricevuta');
    return response.json();
}

function onError(error){
    console.log('Error:'+ error);
}

function mostra(event){
    const description=event.currentTarget.parentNode.querySelector("p");
    const testo=event.currentTarget.parentNode.querySelector("span");
    if(testo.textContent === "Mostra descrizione"){
        description.classList.remove('hidden');
        testo.textContent = "Non mostrare più";
    }
    else{
        description.classList.add('hidden');
        testo.textContent = "Mostra descrizione";
    }
}

function onJson(json){
    console.log(json);
    const lista=document.querySelector("#offerte");
    lista.innerHTML='';
    const doc=json;

    for(let i in doc){
        const tot=document.createElement("div");
        lista.appendChild(tot);
        const nome=doc[i].nome_p;
        const immagine=doc[i].immagine;
        const descrizione=doc[i].descrizione;
        const nome_f=document.createElement("h2");
        nome_f.textContent=nome;
        tot.appendChild(nome_f);
        const immagine_f=document.createElement("img");
        immagine_f.src=immagine;
        tot.appendChild(immagine_f);
        const descrizione_f=document.createElement("p");
        descrizione_f.textContent=descrizione;
        tot.appendChild(descrizione_f); 
        const dettagli=document.createElement("span");
        dettagli.textContent="Mostra descrizione";
        tot.appendChild(dettagli);
        const aggiungi=document.createElement("button");
        aggiungi.textContent="Aggiungi ai preferiti";
        tot.appendChild(aggiungi);

        descrizione_f.classList.add('hidden');

    }

    const contenuto=document.querySelectorAll("#offerte span");
    for(const cont of contenuto){
        cont.addEventListener("click",mostra);
    }

    const preferiti=document.querySelectorAll("#offerte button");
    for(const pref of preferiti){
        pref.addEventListener("click",trovaId);
    }

    const lista1=document.querySelectorAll("#selezionati h2");
    const lista2=document.querySelectorAll("#offerte h2");
    const tasto=document.querySelectorAll("#offerte button");

    for(let i in lista1){
        for(let j in lista2){
            if(lista1[i].textContent===lista2[j].textContent){
                tasto[j].textContent="Inserito nella sezione preferiti";
            }
        }
    }
}

function onJson2(json){
    console.log(json);
    const lista=document.querySelector("#selezionati");
    lista.innerHTML='';
    const doc=json;

    const lista2=document.querySelectorAll("#offerte h2");
    const tasto=document.querySelectorAll("#offerte button");
    
    for(let i in doc){
        const tot=document.createElement("div");
        lista.appendChild(tot);
        const nome=doc[i].nome_p;
        const immagine=doc[i].immagine;
        const nome_f=document.createElement("h2");
        nome_f.textContent=nome;
        tot.appendChild(nome_f);
        const immagine_f=document.createElement("img");
        immagine_f.src=immagine;
        tot.appendChild(immagine_f);
        const aggiungi=document.createElement("button");
        aggiungi.textContent="Rimuovi dai preferiti";
        tot.appendChild(aggiungi);
        
        for(let j in lista2){
            if(lista2[j].textContent===doc[i].nome_p){
                tasto[j].textContent="Inserito nella sezione preferiti";
            }
        }
        
    }

    const preferiti=document.querySelectorAll("#selezionati button");
    for(const pref of preferiti){
        pref.addEventListener("click",elimina);
    }

    if(document.querySelector("#selezionati h2")){ 
        const tot_preferiti=document.querySelector("#preferiti");
        tot_preferiti.classList.remove("hidden");
    }

    if(!document.querySelector("#selezionati h2")){ 
        const tot_preferiti=document.querySelector("#preferiti");
        tot_preferiti.classList.add("hidden");
    }
}

function trovaId(event){
    const identificativo=event.currentTarget.parentNode.querySelector("h2").innerHTML;
    console.log(identificativo);

    fetch(REGISTER_ROUTE+"/aggiungi/"+identificativo).then(preferiti);
}

function elimina(event){
    const identificativo=event.currentTarget.parentNode.querySelector("h2").innerHTML;
    console.log(identificativo);

    const lista2=document.querySelectorAll("#offerte h2");
    const tasto=document.querySelectorAll("#offerte button");

    for(let j in lista2){
        if(lista2[j].textContent===identificativo){
            tasto[j].textContent="Aggungi ai preferiti";
        }
    }

    fetch(REGISTER_ROUTE+"/rimuovi/"+identificativo).then(preferiti);
}


function preferiti(){
    fetch(REGISTER_ROUTE+"/caricamento_preferiti/").then(onResponse).then(onJson2,onError);
}
preferiti();

function piscine(){
    fetch(REGISTER_ROUTE+"/caricamento_piscine/").then(onResponse).then(onJson,onError);
}
piscine();