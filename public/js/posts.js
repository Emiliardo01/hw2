const post = document.querySelector('#post');

fetch('/posts/postShow/').then(onResponse).then(onJson);


function onResponse(response){


    return response.json();

}



function onJson(json){

    console.log(json);

    for(let i=0; i< json.posts.length; i++){

        const contenitore = document.createElement('div');
        contenitore.setAttribute('id', json.posts[i].id);
        const nomeut = document.createElement('span');
        console.log(json.posts[i].Utente);
        const titolo = document.createElement('span');
        const data = document.createElement('span');
        const foto = document.createElement('img');
        const descrizione = document.createElement('span');

        titolo.textContent =JSON.parse(json.posts[i].content).titolo;
        data.textContent = json.posts[i].time;
        foto.src = atob(JSON.parse(json.posts[i].content).immagine);
        descrizione.textContent = JSON.parse(json.posts[i].content).post;
         
        contenitore.appendChild(titolo);
        contenitore.appendChild(data);
        contenitore.appendChild(foto);
        contenitore.appendChild(descrizione);
        post.appendChild(contenitore);

        const username = document.createElement('span');
        const img = document.createElement('img');
        img.setAttribute('class','cuore');
        img.src = 'nolike.png';
        const imm = document.querySelectorAll('div#post div');
    
        username.textContent = 'Post di: '+ json.Utente[i].Username;
    
        imm[i].appendChild(username);
        imm[i].appendChild(img);
        imm[i].addEventListener('click', liker);

      
 
       

    }



    fetch('/posts/checkLike').then(onResponseCheck).then(onJsonCheck);

}


function onResponseCheck(response){

    return response.json();


}

function onJsonCheck(json){

    console.log(json);

    /*2 indici del json*/
    for(let i=0; i< json.id.length ; i++){ /*tot post che conto passati nel json */

    if(json.messaggio === "Presente!"){

        console.log(json);
        const img = document.createElement('img');
        img.setAttribute('class','cuore');
        img.src = 'like.png';
        let id = json.id[i].idpost; // id post
        console.log('Id del/dei posts con like: '+id);
        const imm = document.getElementById(id);
        console.log(imm);
   
        img.classList.add('selezionelike');
        imm.appendChild(img);
        s = imm.querySelector('img.cuore');
        s.remove();
        s.classList.remove('selezionelike');
        console.log(imm);


    }
}




}


let z=0;



function liker(event){



    c = event.currentTarget;

    imm = c.querySelector('div#post div img.cuore');


    if(imm.classList.contains('selezionelike')){

        imm.src = 'nolike.png';
        imm.classList.remove('selezionelike');

        console.log(event.currentTarget.id);
        
        fetch('/posts/unlikePost/'+ encodeURIComponent(String(event.currentTarget.id)) + '/' + encodeURIComponent(String(event.currentTarget.id))).then(unLike).then(onjl);
                

        


    }else{

        console.log(imm);

        imm.src = 'like.png'; 
    
        imm.classList.add('selezionelike');

        console.log(event.currentTarget.id);

        fetch('/posts/likePost/' + encodeURIComponent(String(event.currentTarget.id))+ '/' + encodeURIComponent(String(event.currentTarget.id))).then(unLike).then(onjl);    

    
        console.log('Messo like!');
                


    }




}



function unLike(response){

    return response.json();



}

function onjl(json){

    
    console.log(json);

    const nlike = document.createElement('span');

    const divi = document.getElementById(json.idpost);


    console.log(scritta);

    if (divi.querySelector('.scrittalike') != null){


        console.log(divi);

        nlike.setAttribute('class','scrittalike');
    
        nlike.textContent = 'Numero di likes: '+ json.nlike[0].nlikes;

        divi.querySelector('.scrittalike').replaceChildren(nlike);

    }else {

        nlike.setAttribute('class','scrittalike');
    
        nlike.textContent = 'Numero di likes: '+ json.nlike[0].nlikes;
    
        divi.appendChild(nlike);


    }

}

