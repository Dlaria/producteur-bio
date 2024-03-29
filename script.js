let popup = () => {
    let inputs = document.getElementsByClassName('input-form');
    let cguCgv = document.getElementsByClassName('cgu_cgv');
    console.log(cguCgv[0].checked);
    for(let i=0;i<inputs.length;i++){
        //console.log(inputs[i]);
        //console.log(inputs[i].value);
        if(inputs[i].value !== "" && cguCgv[0].checked === true){
        document.getElementById('popup').style.display = 'block';
    }
    }
}




let plus = (produitId,event) =>{
    let quantite = document.getElementById('quantite-' + produitId);
    quantite.value++
    event.preventDefault();
    opacityBtn(produitId, event);
}


let moins = (produitId,event) =>{
    let quantite = document.getElementById('quantite-' + produitId);
    quantite.value--
    if (+quantite.value < +quantite.min){
        quantite.value = quantite.min;
    }
    event.preventDefault();
    opacityBtn(produitId, event)

}

let opacityBtn = (produitId) =>{
    let quantite = document.getElementById('quantite-' + produitId);
    let btnIndex = document.getElementById('btnIndex');
    console.log(btnIndex);
    console.log(quantite.value);
    if (+quantite.value <= 0){
        btnIndex.setAttribute('disabled',false);
    }else{
        btnIndex.removeAttribute('disabled',true);
    }
}

let prixChange = (produitId, prix1, prix2) =>{
    let selectPoids = document.getElementById('selectPoids-' + produitId);
    let prix = document.getElementById('prix-' + produitId);
    switch (selectPoids.value){
        case "poids":
            prix.innerText = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(prix1) ;
            break;
        case "poids2":
            prix.innerText = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(prix2);
            break;
        default:
            prix.innerText = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format(prix1) ;
            break;
        }
}