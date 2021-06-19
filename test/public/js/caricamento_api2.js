function onResponse(response){
    console.log('Risposta ricevuta');
    return response.json();
}

function onError(error){
    console.log('Error:'+ error);
}

const form=document.querySelector("#musica");
form.addEventListener("submit",cercaPlaylist);

function onJson(json) {
    const lista = document.querySelector("#risultato");
    lista.innerHTML = '';
    const risultati = json.playlists.items;
    let num_ris = risultati.length;
    if(num_ris > 5){
      num_ris = 5;
    }

    for(let i=0; i<num_ris; i++){
      const singleplaylist_data = risultati[i];
      const titolo = singleplaylist_data.name;
      const immagine = singleplaylist_data.images[0].url;
      const singleplaylist = document.createElement("div");
      singleplaylist.classList.add("singleplaylist");
      const img = document.createElement("img");
      img.src = immagine;
      const tit = document.createElement("span");
      tit.textContent = titolo;
      const voto = document.createElement("button");
      voto.textContent = "Inserisci nella wishlist";
      singleplaylist.appendChild(img);
      singleplaylist.appendChild(tit);
      singleplaylist.appendChild(voto);
      voto.addEventListener("click",salvaPlaylist);
      lista.appendChild(singleplaylist);
    }
}

function cercaPlaylist(event){
    const cerca=document.querySelector("#playlist").value;        
    console.log(cerca);
    fetch(REGISTER_ROUTE+"/ricerca/"+cerca).then(onResponse).then(onJson);
    event.preventDefault();
}

function onJson2(json){
    console.log(json);
    const ris=document.querySelector("#cercata");
    console.log(ris);
    for(let i in json){
        if(json[i].playlist){
            const pref=document.querySelector("#risultato");    
            pref.textContent="Grazie per averci suggerito: "+json[i].playlist+".";
            ris.appendChild(pref);         //questo mi permette di non visualizzare più le canzoni cercate, dopo avere selzionato la preferita
            ris.classList.remove("hidden");
        }
    }
}

function leggi_database(){
    fetch(REGISTER_ROUTE+"/cercaMusica/").then(onResponse).then(onJson2);
}

function salvaPlaylist(event){
    let nome=event.currentTarget.parentNode.querySelector("span").innerHTML;

    fetch(REGISTER_ROUTE+"/caricaMusica/"+nome).then(leggi_database);
}

leggi_database();