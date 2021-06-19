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
    const lista=document.querySelector("#tot_corsi");
    lista.innerHTML='';
    const doc=json;

    for(let i in doc){
        const tot=document.createElement("div");
        lista.appendChild(tot);
        const nome=doc[i].nome_c;
        const immagine=doc[i].immagine_corso;
        const descrizione= doc[i].descrizione;
        const orario=doc[i].orario;
        const nome_f=document.createElement("h2");
        nome_f.textContent=nome;
        tot.appendChild(nome_f);
        const orario_f=document.createElement("h4");
        orario_f.textContent=orario;
        tot.appendChild(orario_f);
        const immagine_f=document.createElement("img");
        immagine_f.src=immagine;
        tot.appendChild(immagine_f);
        const descrizione_f=document.createElement("p");
        descrizione_f.textContent=descrizione;
        tot.appendChild(descrizione_f); 
        const dettagli=document.createElement("span");
        dettagli.textContent="Mostra descrizione";
        tot.appendChild(dettagli);

        descrizione_f.classList.add('hidden');
    }

    const contenuto=document.querySelectorAll("#tot_corsi span");
    for(const cont of contenuto){
        cont.addEventListener("click",mostra);
    }
}

function mostraCorsi(){
    fetch(REGISTER_ROUTE+"/caricamento_corsi/").then(onResponse).then(onJson,onError);
}
mostraCorsi();

function cerca(event){
    const parola=document.getElementById("trova");
    const maiuscolo=parola.value.toUpperCase();
    const barra_nomi=document.querySelectorAll("#tot_corsi h2");

    console.log(barra_nomi);

    for(let i=0; i<barra_nomi.length;i++){
        const testo=barra_nomi[i].textContent;
        console.log(testo);
        if(testo.toUpperCase().indexOf(maiuscolo)>-1){          // vedi per orario
            barra_nomi[i].parentNode.classList.remove("hidden");
        }
        else{
            barra_nomi[i].parentNode.classList.add("hidden");
        }
    }
}

document.getElementById("trova").addEventListener("keyup",cerca);