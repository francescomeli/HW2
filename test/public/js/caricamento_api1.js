function onResponse(response){
    console.log('Risposta ricevuta');
    return response.json();
}

function onError(error){
    console.log('Error:'+ error);
}

const form=document.querySelector("#info");
form.addEventListener("submit",cercaSport);

function cercaSport(event){
    const cerca=document.querySelector("#sport").value;
    fetch(REGISTER_ROUTE+"/ricerca/"+cerca).then(onResponse).then(onJson);
    event.preventDefault();
}

function onJson(json){
    console.log(json);
    const lista=document.querySelector("#risultato");
    lista.innerHTML='';
    const doc=json.data;

    if(doc){
        const tot=document.createElement("div");
        lista.appendChild(tot);
        const nome=doc.attributes.name;
        const icona=doc.attributes.icon;
        const immagine=doc.relationships.images.data[0].url;
        const descrizione=doc.attributes.description;
        const nome_res=document.createElement("h1");
        nome_res.textContent=nome;
        lista.appendChild(nome_res);
        const icona_res=document.createElement("img");
        icona_res.src=icona;
        lista.appendChild(icona_res);
        icona_res.classList.add("icona");
        const immagine_res=document.createElement("img");
        immagine_res.src=immagine;
        lista.appendChild(immagine_res);
        immagine_res.classList.add("foto");
        const descrizione_res=document.createElement("h5");
        descrizione_res.textContent=descrizione;
        lista.appendChild(descrizione_res);

        const proposta=document.createElement("p");
        proposta.textContent="Se questo è lo sport che cercavi e che vorresti vedere prossimamente, suggeriscicelo tramite l'apposito bottone in alto a destra.";
        const voto = document.createElement("button");
        voto.textContent = "Suggerisci";
        lista.appendChild(proposta);
        lista.appendChild(voto);
        voto.addEventListener("click",salvaSport);
    }
    else{
        const niente=document.createElement("p");
        niente.textContent="Ci dispiace, lo sport che hai cercato non esiste oppure non ci sono informazioni a riguardo, prova con qualcos'altro.";
        lista.appendChild(niente);
        const non_trovata=document.createElement("img");
        non_trovata.src=["https://www.ilovetorino.com/wp-content/uploads/2014/01/Punto-di-domanda1-266x300.jpg"];
        lista.appendChild(non_trovata);
        non_trovata.classList.add("foto");
    }
}

function onJson2(json){
    console.log(json);
    const ris=document.querySelector("#cercata");
    console.log(ris);
    for(let i in json){
        if(json[i].sport){
            const pref=document.querySelector("#risultato");    
            pref.textContent="Grazie per averci suggerito: "+json[i].sport+".";
            ris.appendChild(pref);         //questo mi permette di non visualizzare più le canzoni cercate, dopo avere selzionato la preferita
            ris.classList.remove("hidden");
        }
    }
}


function salvaSport(event){
    let nome=event.currentTarget.parentNode.querySelector("h1").innerHTML;
    console.log(nome);

    fetch(REGISTER_ROUTE+"/caricaSport/"+nome).then(leggi_database);
}

function leggi_database(){
    fetch(REGISTER_ROUTE+"/cercaSport/").then(onResponse).then(onJson2);
}
leggi_database();